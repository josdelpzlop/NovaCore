<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CosmicDataSeeder extends Seeder
{
    public function run()
    {
        // Limpiar datos previos de lecciones y niveles basura
        DB::table('lesson_user')->truncate();
        Lesson::query()->delete();
        Level::whereIn('title', ['prueba', 'caca'])->delete();

        // Asegurar que los niveles principales existen
        $niveles = [
            [
                'id' => 1,
                'title' => 'Sistema Solar',
                'slug' => 'sistema-solar',
                'badge' => 'Iniciado',
                'description' => 'Explora nuestro vecindario cósmico, desde el ardiente Sol hasta los confines de Plutón.',
            ],
            [
                'id' => 2,
                'title' => 'Vida de las Estrellas',
                'slug' => 'vida-de-las-estrellas',
                'badge' => 'Intermedio',
                'description' => 'Descubre cómo nacen, viven y mueren los motores termonucleares del universo.',
            ],
            [
                'id' => 3,
                'title' => 'Relatividad y Tiempo',
                'slug' => 'relatividad-y-tiempo',
                'badge' => 'Avanzado',
                'description' => 'Adéntrate en los misterios de Einstein, la curvatura del espacio y los agujeros negros.',
            ]
        ];

        foreach ($niveles as $n) {
            Level::updateOrCreate(['id' => $n['id']], $n);
        }

        // --- LECCIONES PARA NIVEL 1: SISTEMA SOLAR ---
        
        Lesson::create([
            'level_id' => 1,
            'title' => 'El Sol: Nuestra Estrella',
            'slug' => 'el-sol-nuestra-estrella',
            'content' => '<p>El Sol es el corazón de nuestro sistema solar. Representa el 99.8% de la masa total de todo el sistema. Es una esfera casi perfecta de plasma caliente, con procesos de fusión nuclear en su núcleo que liberan la energía que permite la vida en la Tierra.</p><p>Sin su gravedad, los planetas saldrían disparados al espacio profundo. Su luz tarda aproximadamente 8 minutos y 20 segundos en llegar a nosotros.</p>',
            'type' => 'text',
            'order' => 1
        ]);

        Lesson::create([
            'level_id' => 1,
            'title' => 'Los Planetas Rocosos',
            'slug' => 'los-planetas-rocosos',
            'content' => '<iframe width="100%" height="400" src="https://www.youtube.com/embed/ZIsU9SAsEwI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><p style="margin-top:20px;">Mercurio, Venus, Tierra y Marte son los cuatro planetas más cercanos al Sol. Se caracterizan por tener una superficie sólida de roca y metal.</p>',
            'type' => 'video',
            'order' => 2
        ]);

        $quizSistSolar = [
            [
                'question' => '¿Qué porcentaje de la masa del sistema solar ocupa el Sol?',
                'options' => ['50%', '75%', '99.8%', '10%'],
                'correct' => 2
            ],
            [
                'question' => '¿Cuál de estos NO es un planeta rocoso?',
                'options' => ['Marte', 'Júpiter', 'Venus', 'Mercurio'],
                'correct' => 1
            ],
            [
                'question' => '¿Cuánto tarda la luz del Sol en llegar a la Tierra?',
                'options' => ['1 segundo', '8 minutos', '24 horas', 'Instantáneo'],
                'correct' => 1
            ]
        ];

        Lesson::create([
            'level_id' => 1,
            'title' => 'Examen del Sistema Solar',
            'slug' => 'examen-sistema-solar',
            'content' => json_encode($quizSistSolar),
            'type' => 'quiz',
            'order' => 3
        ]);

        // --- LECCIONES PARA NIVEL 2: VIDA DE LAS ESTRELLAS ---

        Lesson::create([
            'level_id' => 2,
            'title' => 'Nacimiento en Nebulosas',
            'slug' => 'nacimiento-en-nebulosas',
            'content' => '<p>Las estrellas nacen en nubes gigantes de gas y polvo llamadas nebulosas. Bajo la influencia de la gravedad, el gas comienza a colapsar sobre sí mismo, aumentando la presión y la temperatura hasta que se inicia la fusión nuclear.</p>',
            'type' => 'text',
            'order' => 1
        ]);

        $quizEstrellas = [
            [
                'question' => '¿Dónde nacen las estrellas?',
                'options' => ['En agujeros negros', 'En nebulosas', 'En planetas gaseosos', 'En el vacío absoluto'],
                'correct' => 1
            ],
            [
                'question' => '¿Qué proceso alimenta a una estrella?',
                'options' => ['Combustión de carbón', 'Fusión nuclear', 'Energía solar externa', 'Fricción gravitatoria'],
                'correct' => 1
            ]
        ];

        Lesson::create([
            'level_id' => 2,
            'title' => 'Quiz: Ciclo Estelar',
            'slug' => 'quiz-ciclo-estelar',
            'content' => json_encode($quizEstrellas),
            'type' => 'quiz',
            'order' => 2
        ]);

        // --- LECCIONES PARA NIVEL 3: RELATIVIDAD ---

        Lesson::create([
            'level_id' => 3,
            'title' => 'Espacio-Tiempo Curvo',
            'slug' => 'espacio-tiempo-curvo',
            'content' => '<p>Einstein propuso que la gravedad no es una fuerza invisible, sino la curvatura del tejido del espacio-tiempo causada por la masa. Imagina una cama elástica con una bola de bolos en el centro; cualquier objeto más pequeño rodará hacia ella no porque lo "atraiga", sino porque el camino está curvado.</p>',
            'type' => 'text',
            'order' => 1
        ]);

        $quizRelatividad = [
            [
                'question' => 'Según Einstein, ¿qué causa la gravedad?',
                'options' => ['Magnetismo galáctico', 'La curvatura del espacio-tiempo', 'Partículas llamadas gravitones', 'El movimiento de la Tierra'],
                'correct' => 1
            ]
        ];

        Lesson::create([
            'level_id' => 3,
            'title' => 'Desafío de Einstein',
            'slug' => 'desafio-einstein',
            'content' => json_encode($quizRelatividad),
            'type' => 'quiz',
            'order' => 2
        ]);
    }
}
