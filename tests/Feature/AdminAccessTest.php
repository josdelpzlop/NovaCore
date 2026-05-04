<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Tests para verificar que el control de acceso al panel de administración
 * funciona correctamente. Solo los usuarios con rol 'admin' deben poder entrar.
 */
class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifica que un usuario no autenticado (invitado) es redirigido
     * al login cuando intenta acceder al panel de administración.
     */
    public function test_invitado_no_puede_acceder_al_panel_admin()
    {
        $response = $this->get('/admin');

        // Debe redirigir al login (302)
        $response->assertRedirect('/login');
    }

    /**
     * Verifica que un usuario con rol 'estudiante' recibe un error 403
     * (Prohibido) al intentar acceder al panel de administración.
     */
    public function test_estudiante_no_puede_acceder_al_panel_admin()
    {
        $estudiante = User::factory()->create(['role' => 'estudiante']);

        $response = $this->actingAs($estudiante)->get('/admin');

        // Debe recibir un 403 Forbidden
        $response->assertStatus(403);
    }

    /**
     * Verifica que un usuario con rol 'admin' puede acceder
     * correctamente al panel de administración.
     */
    public function test_admin_puede_acceder_al_panel_admin()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/admin');

        // Debe poder ver el panel (200 OK)
        $response->assertStatus(200);
    }
}
