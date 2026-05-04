<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait TranslatesText
{
    /**
     * Traduce un texto al español usando Google Translate.
     */
    protected function translateToSpanish($text)
    {
        if (empty($text)) return '';
        
        try {
            $response = Http::get("https://translate.googleapis.com/translate_a/single", [
                'client' => 'gtx',
                'sl' => 'en',
                'tl' => 'es',
                'dt' => 't',
                'q' => $text
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $translatedText = '';
                
                // Google devuelve múltiples arrays si detecta muchos párrafos, los unimos.
                if (isset($data[0]) && is_array($data[0])) {
                    foreach ($data[0] as $chunk) {
                        if (isset($chunk[0])) {
                            $translatedText .= $chunk[0];
                        }
                    }
                    return $translatedText;
                }
            }
        } catch (\Exception $e) {
            // Si la magia falla, retornamos el texto original en inglés
        }
        
        return $text;
    }
}
