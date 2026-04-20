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
        // Guardamos en Caché hasta 12 horas para evitar consumir el límite
        $apod = Cache::remember('nasa_apod_es', 43200, function () {
            $apiKey = env('NASA_API_KEY', 'DEMO_KEY');
            $response = Http::get("https://api.nasa.gov/planetary/apod?api_key={$apiKey}");
            
            if ($response->successful()) {
                $data = $response->json();
                
                // Traducir dinámicamente usando el trait libre (Magia para tu Portfolio)
                $data['title'] = $this->translateToSpanish($data['title']);
                $data['explanation'] = $this->translateToSpanish($data['explanation']);
                
                return $data;
            }
            
            // Fallback
            return [
                'title' => 'Conexión Perdida: Fenómeno no Clasificado',
                'url' => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=2000&auto=format&fit=crop',
                'explanation' => 'Los sensores de largo alcance de NovaCore no han podido establecer conexión con la base de datos de la NASA.',
                'date' => now()->toDateString(),
                'media_type' => 'image',
            ];
        });

        return view('pages.fenomenos', compact('apod'));
    }
}
