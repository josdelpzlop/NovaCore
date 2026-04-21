<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'title' => 'Lluvia de Estrellas Perseidas',
                'description' => 'Acompáñanos a observar uno de los eventos astronómicos más espectaculares del año.',
                'location' => 'Observatorio Virtual NovaCore',
                'xp_reward' => 200,
            ],
            [
                'title' => 'Alineación Planetaria Júpiter-Saturno',
                'description' => 'Un evento raro donde Júpiter y Saturno se alinean en el cielo nocturno.',
                'location' => 'Transmisión en Vivo',
                'xp_reward' => 250,
            ],
            [
                'title' => 'Eclipse Solar Parcial',
                'description' => 'Observación del eclipse solar con telescopios equipados con filtros especiales.',
                'location' => 'Centro de Visitantes',
                'xp_reward' => 300,
            ],
            [
                'title' => 'Superluna de Sangre',
                'description' => 'Descubre por qué la luna se tiñe de rojo durante este eclipse lunar total.',
                'location' => 'Observatorio Norte',
                'xp_reward' => 150,
            ],
            [
                'title' => 'Observación de Cúmulos Estelares',
                'description' => 'Exploración profunda del cielo estrellado buscando cúmulos globulares.',
                'location' => 'Telescopio Principal',
                'xp_reward' => 100,
            ]
        ];

        foreach ($events as $index => $eventData) {
            Event::create([
                'title' => $eventData['title'],
                'slug' => Str::slug($eventData['title']) . '-' . rand(100, 999),
                'description' => $eventData['description'],
                'event_date' => Carbon::now()->addDays($index + 1),
                'location' => $eventData['location'],
                'status' => 'upcoming',
                'xp_reward' => $eventData['xp_reward'],
            ]);
        }
    }
}
