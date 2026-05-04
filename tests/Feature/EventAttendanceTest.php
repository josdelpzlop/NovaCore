<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Tests para verificar que el sistema de asistencia a eventos
 * funciona correctamente y otorga XP al usuario.
 */
class EventAttendanceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifica que un usuario autenticado puede inscribirse a un evento
     * y recibe la XP de recompensa configurada en ese evento.
     */
    public function test_usuario_puede_asistir_a_evento_y_recibe_xp()
    {
        $user = User::factory()->create(['xp' => 0]);
        $event = Event::create([
            'title' => 'Observación Lunar',
            'slug' => 'observacion-lunar',
            'description' => 'Evento de prueba',
            'event_date' => now()->addDays(7),
            'xp_reward' => 100,
        ]);

        // El usuario se inscribe al evento
        $response = $this->actingAs($user)->post("/eventos/{$event->id}/asistir");

        // Verificar: el usuario aparece como asistente y tiene 100 XP
        $user->refresh();
        $this->assertEquals(100, $user->xp);
        $this->assertTrue($user->attendedEvents()->where('event_id', $event->id)->exists());
        $response->assertRedirect();
    }

    /**
     * Verifica que inscribirse dos veces al mismo evento NO duplica la XP.
     */
    public function test_asistir_dos_veces_no_duplica_xp()
    {
        $user = User::factory()->create(['xp' => 0]);
        $event = Event::create([
            'title' => 'Lluvia de Estrellas',
            'slug' => 'lluvia-estrellas',
            'description' => 'Evento de prueba',
            'event_date' => now()->addDays(3),
            'xp_reward' => 75,
        ]);

        // Intentar asistir dos veces
        $this->actingAs($user)->post("/eventos/{$event->id}/asistir");
        $this->actingAs($user)->post("/eventos/{$event->id}/asistir");

        // Solo debe tener 75 XP, no 150
        $user->refresh();
        $this->assertEquals(75, $user->xp);
        $this->assertEquals(1, $user->attendedEvents()->count());
    }

    /**
     * Verifica que un usuario NO autenticado no puede inscribirse a un evento.
     */
    public function test_invitado_no_puede_asistir_a_evento()
    {
        $event = Event::create([
            'title' => 'Eclipse Solar',
            'slug' => 'eclipse-solar',
            'description' => 'Evento de prueba',
            'event_date' => now()->addDays(5),
            'xp_reward' => 50,
        ]);

        // Sin login, debe redirigir al login
        $response = $this->post("/eventos/{$event->id}/asistir");

        $response->assertRedirect('/login');
    }
}
