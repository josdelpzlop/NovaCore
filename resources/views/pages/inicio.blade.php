@extends('layouts.master')

@section('title', 'NovaCore - Inicio')

@section('content')
    <div class="hero">
        <section class="intro-text" style="animation: fadeUp 1s ease-out;">
            <h2 style="font-size: 3rem; background: -webkit-linear-gradient(#fff, #1cc88a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Explora lo desconocido,<br>domina el cosmos.</h2>
            <p style="font-size: 1.2rem;">
                NovaCore es un espacio de divulgación astronómica diseñado para mentes curiosas.
                Sumérgete en un viaje educativo donde la ciencia se encuentra con la interactividad
                y el juego.
            </p>
        </section>

        <section class="fenomenos-box" style="animation: fadeUp 1s ease-out 0.3s backwards;">
            <h3 style="border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px;">Fenómenos Cósmicos</h3>
            <ul style="display: flex; flex-direction: column; gap: 10px; margin-top: 20px;">
                <li>
                    <a href="{{ route('fenomenos.show', 'nebulosa-croma-9') }}" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 15px; border-radius: 12px;">Nebulosa Croma-9</a>
                </li>
                <li>
                    <a href="{{ route('fenomenos.show', 'vortice-sigma') }}" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 15px; border-radius: 12px;">Vórtice de Sigma</a>
                </li>
                <li>
                    <a href="{{ route('fenomenos.show', 'lluvia-diamantes') }}" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 15px; border-radius: 12px;">Lluvia de Diamantes</a>
                </li>
            </ul>
        </section>
    </div>

    <!-- Animaciones Base CSS -->
    <style>
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection