@extends('layouts.master')

@section('title', 'Sugerencias - NovaCore')

@section('content')
<div style="padding: 100px 20px; max-width: 800px; margin: 0 auto; min-height: 70vh;">
    <div class="cosmic-card" style="background: rgba(16, 26, 43, 0.7); backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; padding: 40px;">
        <h1 style="color: var(--menta); margin-top: 0; font-size: 2.5rem;">Sugerencias y Reportes</h1>
        <p style="color: #cbd5e1; font-size: 1.1rem; line-height: 1.8;">
            ¿Has encontrado un campo de fuerza extraño o tienes ideas para mejorar la estación espacial de aprendizaje NovaCore?
            Déjanos tu reporte en la terminal de comunicaciones.
        </p>
        
        <form action="#" method="POST" style="margin-top: 30px;">
            <div style="margin-bottom: 20px;">
                <label style="display: block; color: var(--lavanda); font-weight: bold; margin-bottom: 8px;">Asunto</label>
                <input type="text" placeholder="Ej. Nuevo módulo de agujeros negros" style="width: 100%; padding: 12px 15px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; color: var(--lavanda); font-weight: bold; margin-bottom: 8px;">Tu mensaje</label>
                <textarea rows="5" placeholder="Detalla tu sugerencia..." style="width: 100%; padding: 12px 15px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;"></textarea>
            </div>
            <button type="button" class="btn-login" style="margin-left: 0; border: none; cursor: pointer;">Enviar Transmisión</button>
        </form>
    </div>
</div>
@endsection
