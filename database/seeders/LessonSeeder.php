<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Level;
use Illuminate\Support\Str;

class LessonSeeder extends Seeder
{
    public function run()
    {
        $levels = Level::all();
        
        if ($levels->isEmpty()) {
            return;
        }

        $lessonCount = 1;
        foreach ($levels as $level) {
            for ($i = 1; $i <= 15; $i++) {
                Lesson::create([
                    'level_id' => $level->id,
                    'title' => "Lección {$lessonCount}: " . Str::random(10),
                    'slug' => Str::slug("Lección {$lessonCount} " . Str::random(5)),
                    'content' => 'Contenido de la lección para pruebas para que puedas sumar XP rápidamente.',
                    'type' => 'text',
                    'order' => $i
                ]);
                $lessonCount++;
            }
        }
    }
}
