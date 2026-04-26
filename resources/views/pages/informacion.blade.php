@extends('layouts.master')

@section('title', 'Información | NovaCore')

@section('content')
<div style="padding: 100px 5%; max-width: 1200px; margin: 0 auto; min-height: 70vh;">
    <h1 style="text-align: center; margin-top: 0; font-size: 3.5rem; margin-bottom: 40px; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, var(--menta)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; filter: drop-shadow(0 0 20px rgba(89, 222, 160, 0.3));">
        Información General
    </h1>

    <div class="bento-grid" style="
        display: grid; 
        grid-template-columns: 1fr 1fr; 
        gap: 25px; 
    ">
        
        <!-- Tarjeta 1: Acerca de NovaCore (Destacada) -->
        <div class="bento-card" style="
            background: linear-gradient(135deg, rgba(39, 70, 255, 0.1), rgba(104, 14, 188, 0.2)); 
            backdrop-filter: blur(15px); 
            border: 1px solid rgba(255,255,255,0.1); 
            border-radius: 24px; 
            padding: 40px;
            grid-column: span 2;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        ">
            <h2 style="color: white; margin-top: 0; font-size: 2.2rem; letter-spacing: -0.5px;">Acerca de NovaCore</h2>
            <p style="color: #e2e8f0; font-size: 1.15rem; line-height: 1.8; max-width: 800px;">
                <strong>NovaCore</strong> es una academia digital de nueva generación diseñada para transformar el aprendizaje de ciencias espaciales y la astronomía en una experiencia interactiva. Desarrollada con arquitectura escalable y estética inmersiva para los exploradores del mañana.
            </p>
        </div>

        <!-- Tarjeta 2: Nuestro Objetivo Misión -->
        <div class="bento-card" style="
            background: rgba(16, 26, 43, 0.7); 
            backdrop-filter: blur(15px); 
            border: 1px solid rgba(255,255,255,0.1); 
            border-radius: 24px; 
            padding: 40px;
            box-shadow: inset 0 0 20px rgba(89, 222, 160, 0.05);
        ">
            <h3 style="color: var(--menta); margin-top: 0; font-size: 1.3rem; text-transform: uppercase; letter-spacing: 1px;">
                Objetivo Central
            </h3>
            <p style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.7;">
                Llevar el universo al navegador de cualquier persona. Superar las barreras del texto estático de la web tradicional y convertir la educación en un viaje de descubrimiento impulsado por datos reales y recompensas.
            </p>
        </div>

        <!-- Tarjeta 3: Licencias y Créditos -->
        <div class="bento-card" style="
            background: rgba(16, 26, 43, 0.7); 
            backdrop-filter: blur(15px); 
            border: 1px solid rgba(255,255,255,0.1); 
            border-radius: 24px; 
            padding: 40px;
        ">
            <h3 style="color: var(--lavanda); margin-top: 0; font-size: 1.3rem; text-transform: uppercase; letter-spacing: 1px;">
                Licencias y Uso
            </h3>
            <p style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.7;">
                NovaCore Enterprise v2.5.5<br>
                2026 © Registrado bajo protocolos de desarrollo Open-Source colaborativo. Sistema de Aprendizaje Modular.
            </p>
        </div>

        <!-- Tarjeta 4: Enlaces Interactivos / Relleno visual -->
        <div class="bento-card" style="
            background: transparent;
            border: 1px solid rgba(255,255,255,0.1); 
            border-radius: 24px; 
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            grid-column: span 2;
        ">
            <h3 style="color: white; margin-top: 0; font-size: 1.5rem;">Programa de Adiestramiento Activo</h3>
            <p style="color: #94a3b8; font-size: 1rem; max-width: 500px;">La Federación actualmente está evaluando nuevas incorporaciones para la expedición de mapeo estelar.</p>
            <a href="{{ route('register') }}" class="btn-login" style="margin: 15px 0 0 0; display: inline-block;">Iniciar Formación</a>
        </div>

    </div>
</div>

<!-- Estilos para adaptar el Bento-Grid a móviles -->
<style>
    @media (max-width: 900px) {
        .bento-grid .bento-card {
            grid-column: span 1 !important;
        }
    }
</style>
@endsection
