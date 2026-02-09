<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'title' => 'Sistema Solar',
            'slug' => Str::slug('Sistema Solar'),
            'badge' => 'Iniciado',
            'description' => 'Aprende las mecánicas básicas de nuestros planetas vecinos y el cinturón de asteroides.',
            'url' => '#'
        ]);

        Level::create([
            'title' => 'Vida de las Estrellas',
            'slug' => Str::slug('Vida de las Estrellas'),
            'badge' => 'Intermedio',
            'description' => 'Desde protoestrellas hasta supernovas. Entiende el ciclo de vida del hidrógeno.',
            'url' => '#'
        ]);

        Level::create([
            'title' => 'Relatividad y Tiempo',
            'slug' => Str::slug('Relatividad y Tiempo'),
            'badge' => 'Avanzado',
            'description' => 'Explora cómo la gravedad dobla la realidad cerca de los agujeros negros.',
            'url' => '#'
        ]);
    }
}
