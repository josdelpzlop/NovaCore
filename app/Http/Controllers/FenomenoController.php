<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Traits\TranslatesText;

class FenomenoController extends Controller
{
    use TranslatesText;

    public function index()
    {
        // Intentamos obtener de la caché primero
        $apod = Cache::get('nasa_apod_es');

        if (!$apod) {
            $apiKey = env('NASA_API_KEY', 'DEMO_KEY');
            $response = Http::get("https://api.nasa.gov/planetary/apod?api_key={$apiKey}");
            
            if ($response->successful()) {
                $data = $response->json();
                
                // Traducir título y descripción al español
                $data['title'] = $this->translateToSpanish($data['title']);
                $data['explanation'] = $this->translateToSpanish($data['explanation']);
                
                $apod = $data;
                // Guardamos en Caché hasta 12 horas para evitar consumir el límite solo si hay éxito
                Cache::put('nasa_apod_es', $apod, 43200);
            } else {
                // Fallback (no se guarda en caché, así lo intenta de nuevo en la siguiente recarga)
                $apod = [
                    'title' => 'Conexión Perdida: Fenómeno no Clasificado',
                    'url' => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=2000&auto=format&fit=crop',
                    'explanation' => 'Los sensores de largo alcance de NovaCore no han podido establecer conexión con la base de datos de la NASA. Puede que se haya agotado el límite de peticiones diario. Inténtalo de nuevo más tarde.',
                    'date' => now()->toDateString(),
                    'media_type' => 'image',
                ];
            }
        }

        $fenomenosLocales = \App\Models\Fenomeno::orderBy('date', 'desc')->get();

        return view('pages.fenomenos', compact('apod', 'fenomenosLocales'));
    }
}
