@extends('layouts.master')

@section('title', 'Academia | NovaCore')

@section('content')
    <!-- Fondo decorativo estático - Academia (Azul Cósmico) -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #1e3a8a 0%, transparent 70%); filter: blur(100px); opacity: 0.15;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, #0284c7 0%, transparent 70%); filter: blur(120px); opacity: 0.1;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #3b82f6 0%, transparent 70%); filter: blur(100px); opacity: 0.1;"></div>
    </div>

    <main style="max-width: 1200px; margin: 0 auto; padding: 100px 5% 50px; min-height: 80vh;">
        
        <!-- Texto de Introducción Estilizado -->
        <section style="text-align: center; margin-bottom: 5rem;">
            <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); color: #60a5fa; padding: 6px 18px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 2px;">
                <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Centro de Entrenamiento
            </div>
            <h2 style="font-size: 3.5rem; margin-top: 0; margin-bottom: 20px; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 0 30px rgba(59, 130, 246, 0.3);">
                Academia NovaCore
            </h2>
            <div style="background: rgba(16, 26, 43, 0.8); border: 1px solid rgba(255,255,255,0.05); padding: 30px 40px; border-radius: 20px; max-width: 750px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                <p style="font-size: 1.15rem; color: #cbd5e1; line-height: 1.8; margin: 0;">
                    Domina los fundamentos de la astrofísica y la exploración espacial a través de nuestros módulos interactivos. Elige tu nivel de dificultad y comienza a desbloquear conocimientos cósmicos y puntos de experiencia (XP).
                </p>
            </div>
        </section>

        <!-- Tarjetas de Lecciones (Niveles) Estilizadas -->
        <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
            @foreach ($levels as $index => $level)
                <a href="{{ route('levels.show', $level) }}" style="text-decoration: none; display: flex; flex-direction: column; background: linear-gradient(145deg, rgba(16, 26, 43, 0.8), rgba(10, 15, 25, 0.95)); border: 1px solid rgba(59, 130, 246, 0.2); border-radius: 24px; padding: 30px; transition: all 0.3s ease; position: relative; overflow: hidden;" class="academy-card hover-lift">
                    
                    <!-- Brillo superior -->
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: linear-gradient(90deg, transparent, #3b82f6, transparent); opacity: 0.5;"></div>

                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                        <div style="background: rgba(59, 130, 246, 0.15); color: #60a5fa; padding: 6px 14px; border-radius: 8px; font-size: 0.8rem; font-weight: bold; text-transform: uppercase; border: 1px solid rgba(59, 130, 246, 0.3);">
                            {{ $level->badge }}
                        </div>
                        <div style="color: rgba(255,255,255,0.05); font-size: 3rem; font-weight: 900; line-height: 0.8; letter-spacing: -2px;">
                            0{{ $index + 1 }}
                        </div>
                    </div>
                    
                    <h3 style="margin: 0 0 15px 0; font-size: 1.6rem; color: white;">{{ $level->title }}</h3>
                    <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; flex-grow: 1; margin-bottom: 25px;">
                        {{ $level->description }}
                    </p>
                    
                    <div style="display: flex; align-items: center; color: #3b82f6; font-weight: bold; font-size: 0.95rem; margin-top: auto;">
                        Comenzar Módulo 
                        <svg style="width: 1.2rem; height: 1.2rem; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </a>
            @endforeach
        </section>
    </main>

    <style>
        .academy-card:hover {
            border-color: #3b82f6 !important;
            box-shadow: 0 15px 40px rgba(0,0,0,0.6), inset 0 0 20px rgba(59, 130, 246, 0.1) !important;
        }
        .hover-lift {
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .hover-lift:hover {
            transform: translateY(-10px);
        }
    </style>
@endsection