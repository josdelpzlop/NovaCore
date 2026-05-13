<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Traits\TranslatesText;

class FenomenoController extends Controller
{
    use TranslatesText;

    public function index()
    {
        // Caché de la imagen astronómica del día (12 horas)
        $apod = Cache::remember('nasa_apod_es', 43200, function () {
            try {
                $apiKey = env('NASA_API_KEY', 'DEMO_KEY');
                $response = Http::timeout(5)->get("https://api.nasa.gov/planetary/apod?api_key={$apiKey}");
                
                if ($response->successful()) {
                    $data = $response->json();
                    
                    // Traducir título y descripción al español
                    $data['title'] = $this->translateToSpanish($data['title']);
                    $data['explanation'] = $this->translateToSpanish($data['explanation']);
                    
                    return $data;
                }
            } catch (\Exception $e) {
                // Si la API de NASA falla, seguimos sin bloquear la página
                Log::warning('NASA APOD API no disponible: ' . $e->getMessage());
            }

            // Fallback: datos de emergencia para que la vista no se rompa
            return null;
        });

        // Si la caché almacenó null (porque la API falló), mostramos datos de emergencia
        if (!$apod) {
            $apod = [
                'title' => 'Conexión Perdida: Fenómeno no Clasificado',
                'url' => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=2000&auto=format&fit=crop',
                'explanation' => 'Actualmente no podemos conectar con los servidores de la NASA para obtener la imagen del día. Esto suele ser temporal, por favor vuelve a intentarlo más tarde.',
                'date' => now()->toDateString(),
                'media_type' => 'image',
            ];
            // Borramos la caché para que lo reintente en la siguiente visita
            Cache::forget('nasa_apod_es');
        }

        $fenomenosLocales = \App\Models\Fenomeno::orderBy('date', 'desc')->get();

        return view('pages.fenomenos', compact('apod', 'fenomenosLocales'));
    }
}
