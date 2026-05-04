<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Tests para verificar que las páginas públicas de NovaCore
 * cargan correctamente sin necesidad de autenticación.
 */
class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * La página de inicio carga correctamente.
     */
    public function test_pagina_inicio_carga_correctamente()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * La página de información carga correctamente.
     */
    public function test_pagina_informacion_carga_correctamente()
    {
        $response = $this->get('/informacion');

        $response->assertStatus(200);
    }

    /**
     * La página de sugerencias carga correctamente.
     */
    public function test_pagina_sugerencias_carga_correctamente()
    {
        $response = $this->get('/sugerencias');

        $response->assertStatus(200);
    }

    /**
     * Un usuario NO autenticado NO puede acceder al dashboard.
     * Debe ser redirigido al login.
     */
    public function test_dashboard_requiere_autenticacion()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    /**
     * Un usuario NO autenticado NO puede acceder a la academia.
     */
    public function test_academia_requiere_autenticacion()
    {
        $response = $this->get('/aprende');

        $response->assertRedirect('/login');
    }
}
