<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Level;
use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Tests para verificar que el sistema de lecciones y XP funciona correctamente.
 * Comprobamos que un usuario puede completar una lección, recibir XP,
 * y que no se duplican los registros si la completa dos veces.
 */
class LessonCompletionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifica que al completar una lección, se registra en la tabla pivot
     * y el usuario recibe 50 puntos de experiencia.
     */
    public function test_completar_leccion_otorga_xp()
    {
        // Preparar: crear usuario, nivel y lección
        $user = User::factory()->create(['xp' => 0]);
        $level = Level::create([
            'title' => 'Sistema Solar',
            'slug' => 'sistema-solar',
            'badge' => 'Iniciado',
            'description' => 'Nivel de prueba',
        ]);
        $lesson = Lesson::create([
            'level_id' => $level->id,
            'title' => 'El Sol',
            'slug' => 'el-sol',
            'order' => 1,
        ]);

        // Actuar: el usuario completa la lección
        $response = $this->actingAs($user)->post("/lecciones/{$lesson->id}/completar");

        // Verificar: el usuario tiene 50 XP y la lección aparece como completada
        $user->refresh();
        $this->assertEquals(50, $user->xp);
        $this->assertTrue($user->completedLessons()->where('lesson_id', $lesson->id)->exists());
    }

    /**
     * Verifica que completar la misma lección dos veces NO duplica la XP.
     * El sistema debe ignorar el segundo intento.
     */
    public function test_completar_leccion_dos_veces_no_duplica_xp()
    {
        $user = User::factory()->create(['xp' => 0]);
        $level = Level::create([
            'title' => 'Estrellas',
            'slug' => 'estrellas',
            'badge' => 'Intermedio',
            'description' => 'Nivel de prueba',
        ]);
        $lesson = Lesson::create([
            'level_id' => $level->id,
            'title' => 'Gigantes Rojas',
            'slug' => 'gigantes-rojas',
            'order' => 1,
        ]);

        // Completar la lección dos veces
        $this->actingAs($user)->post("/lecciones/{$lesson->id}/completar");
        $this->actingAs($user)->post("/lecciones/{$lesson->id}/completar");

        // La XP debe seguir siendo 50, no 100
        $user->refresh();
        $this->assertEquals(50, $user->xp);
        $this->assertEquals(1, $user->completedLessons()->count());
    }

    /**
     * Verifica que después de completar una lección, el usuario es redirigido
     * automáticamente a la siguiente lección del nivel (ordenadas por 'order').
     */
    public function test_redirige_a_siguiente_leccion_tras_completar()
    {
        $user = User::factory()->create(['xp' => 0]);
        $level = Level::create([
            'title' => 'Relatividad',
            'slug' => 'relatividad',
            'badge' => 'Avanzado',
            'description' => 'Nivel de prueba',
        ]);
        $leccion1 = Lesson::create([
            'level_id' => $level->id,
            'title' => 'Espacio-Tiempo',
            'slug' => 'espacio-tiempo',
            'order' => 1,
        ]);
        $leccion2 = Lesson::create([
            'level_id' => $level->id,
            'title' => 'Agujeros Negros',
            'slug' => 'agujeros-negros',
            'order' => 2,
        ]);

        // Al completar la lección 1, debe redirigir a la lección 2
        $response = $this->actingAs($user)->post("/lecciones/{$leccion1->id}/completar");

        $response->assertRedirect(route('lessons.show', [$level, $leccion2]));
    }
}
