@extends('layouts.master')

@section('title', 'Recompensas - NovaCore')

@section('content')
<div class="recompensas-container" style="max-width: 1100px; margin: 3rem auto; padding: 0 5%; min-height: 70vh;">
    <section class="hero-recompensas" style="margin-bottom: 3rem;">
        <h1 style="font-size: 3rem; color: var(--menta); margin-bottom: 1rem; text-shadow: 0 0 20px rgba(89, 222, 160, 0.2);">Logros del Comandante</h1>
        <p style="font-size: 1.15rem; color: #e2e8f0; line-height: 1.8;">Tu colección personal de honores espaciales y descubrimientos validados. Aquí detallamos los requisitos para obtener las insignias disponibles en la academia.</p>
    </section>

    <!-- Barra de Progreso Simulada -->
    <section class="progreso-global" style="background: rgba(255,255,255,0.05); border-radius: 20px; padding: 2rem; border: 1px solid rgba(255,255,255,0.1); margin-bottom: 3rem; display: flex; align-items: center; gap: 2rem;">
        <div class="bar-container" style="flex-grow: 1; height: 12px; background: rgba(0,0,0,0.5); border-radius: 10px; overflow: hidden;">
            <div class="bar-fill" style="width: 65%; height: 100%; background: linear-gradient(90deg, #2746FF, #59DEA0); box-shadow: 0 0 15px rgba(39, 70, 255, 0.5);"></div>
        </div>
        <div class="stats-text" style="text-align: right;">
            <span style="color: var(--menta); font-weight: bold; font-size: 1.2rem;">65%</span> 
            <span style="font-size: 0.8rem; color: rgba(255,255,255,0.5); display: block;">Completado Global</span>
        </div>
    </section>

    <div class="bento-grid trofeos-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 2rem;">
        
        <!-- Recompensa 1 -->
        <div class="bento-card trofeo-card" style="background: linear-gradient(135deg, rgba(39, 70, 255, 0.1), rgba(104, 14, 188, 0.1)); border: 1px solid rgba(255,255,255,0.1); border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); transition: all 0.3s ease;">
            <span class="trofeo-icon" style="font-size: 3.5rem; margin-bottom: 1rem; display: block; filter: drop-shadow(0 0 10px rgba(135, 103, 235, 0.5));">🌑</span>
            <h3 style="font-size: 1.1rem; color: var(--lavanda); margin-top: 0;">Pionero Lunar</h3>
            <p style="font-size: 0.85rem; color: #cbd5e1; margin-bottom: 15px;">Nivel 1 de Aprende completado.</p>
            <span style="font-size: 0.8rem; color: var(--menta); text-transform: uppercase;">✔ Obtenido</span>
        </div>

        <!-- Recompensa 2 -->
        <div class="bento-card trofeo-card" style="background: linear-gradient(135deg, rgba(39, 70, 255, 0.1), rgba(104, 14, 188, 0.1)); border: 1px solid rgba(255,255,255,0.1); border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); transition: all 0.3s ease;">
            <span class="trofeo-icon" style="font-size: 3.5rem; margin-bottom: 1rem; display: block; filter: drop-shadow(0 0 10px rgba(135, 103, 235, 0.5));">🌠</span>
            <h3 style="font-size: 1.1rem; color: var(--lavanda); margin-top: 0;">Cazador Estelar</h3>
            <p style="font-size: 0.85rem; color: #cbd5e1; margin-bottom: 15px;">Avistamiento de 5 fenómenos espaciales.</p>
            <span style="font-size: 0.8rem; color: var(--menta); text-transform: uppercase;">✔ Obtenido</span>
        </div>

        <!-- Recompensa 3 -->
        <div class="bento-card trofeo-card locked" style="background: rgba(16, 26, 43, 0.5); border: 1px solid rgba(255,255,255,0.05); border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); filter: grayscale(1) opacity(0.6);">
            <span class="trofeo-icon" style="font-size: 3.5rem; margin-bottom: 1rem; display: block;">🪐</span>
            <h3 style="font-size: 1.1rem; color: #94a3b8; margin-top: 0;">Rey de los Anillos</h3>
            <p style="font-size: 0.85rem; color: #94a3b8; margin-bottom: 15px;">Completa el Nivel Saturno interactivo.</p>
            <span style="font-size: 0.8rem; color: #64748b; text-transform: uppercase;">🔒 Bloqueado</span>
        </div>

        <!-- Recompensa 4 -->
        <div class="bento-card trofeo-card" style="background: linear-gradient(135deg, rgba(39, 70, 255, 0.1), rgba(104, 14, 188, 0.1)); border: 1px solid rgba(255,255,255,0.1); border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); transition: all 0.3s ease;">
            <span class="trofeo-icon" style="font-size: 3.5rem; margin-bottom: 1rem; display: block; filter: drop-shadow(0 0 10px rgba(135, 103, 235, 0.5));">🚀</span>
            <h3 style="font-size: 1.1rem; color: var(--lavanda); margin-top: 0;">Vuelo Inaugural</h3>
            <p style="font-size: 0.85rem; color: #cbd5e1; margin-bottom: 15px;">Asistir a tu primer evento astronómico.</p>
            <span style="font-size: 0.8rem; color: var(--menta); text-transform: uppercase;">✔ Obtenido</span>
        </div>
        
         <!-- Recompensa 5 -->
        <div class="bento-card trofeo-card locked" style="background: rgba(16, 26, 43, 0.5); border: 1px solid rgba(255,255,255,0.05); border-radius: 24px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); filter: grayscale(1) opacity(0.6);">
            <span class="trofeo-icon" style="font-size: 3.5rem; margin-bottom: 1rem; display: block;">🏆</span>
            <h3 style="font-size: 1.1rem; color: #94a3b8; margin-top: 0;">Leyenda Nova</h3>
            <p style="font-size: 0.85rem; color: #94a3b8; margin-bottom: 15px;">Obtener todas las medallas de nivel.</p>
            <span style="font-size: 0.8rem; color: #64748b; text-transform: uppercase;">🔒 Bloqueado</span>
        </div>

    </div>
</div>

<style>
    .trofeo-card:hover:not(.locked) {
        transform: translateY(-8px);
        border-color: rgba(89, 222, 160, 0.5) !important;
        background: rgba(39, 70, 255, 0.15) !important;
        box-shadow: 0 15px 30px rgba(0,0,0,0.4), inset 0 0 15px rgba(39, 70, 255, 0.1);
    }
    @media (max-width: 768px) {
        .progreso-global {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        .bar-container {
            width: 100%;
        }
        .stats-text {
            text-align: left !important;
        }
    }
</style>
@endsection
