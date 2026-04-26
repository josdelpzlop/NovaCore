<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Rank::create(['number' => 1, 'title' => 'Explorador Novato', 'min_xp' => 0, 'color' => '#1cc88a']);
        \App\Models\Rank::create(['number' => 2, 'title' => 'Astronauta Curioso', 'min_xp' => 200, 'color' => '#36b9cc']);
        \App\Models\Rank::create(['number' => 3, 'title' => 'Ingeniero de Vuelo', 'min_xp' => 600, 'color' => '#4e73df']);
        \App\Models\Rank::create(['number' => 4, 'title' => 'Ayudante Estelar', 'min_xp' => 1000, 'color' => '#eab308']);
        \App\Models\Rank::create(['number' => 'MAX', 'title' => 'Ente Espacial', 'min_xp' => 2000, 'color' => '#a855f7']);
    }
}
