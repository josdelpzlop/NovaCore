@extends('layouts.master')

@section('title', 'Nivel: ' . $level->title)

@section('content')
    <!-- Fondo Cósmico Azul para mantener la consistencia con la Academia -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #1e3a8a 0%, transparent 70%); filter: blur(100px); opacity: 0.3; animation: pulseGlow 8s infinite alternate;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, #0284c7 0%, transparent 70%); filter: blur(120px); opacity: 0.2; animation: pulseGlow 10s infinite alternate-reverse;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #3b82f6 0%, transparent 70%); filter: blur(100px); opacity: 0.2; animation: pulseGlow 12s infinite alternate;"></div>
        
        <div style="position: absolute; top: 0; left: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(59,130,246,0.15), transparent);"></div>
        <div style="position: absolute; top: 0; right: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(59,130,246,0.15), transparent);"></div>
    </div>

<main style="padding: 100px 5% 50px; max-width: 1000px; margin: auto; min-height: 80vh;">
    
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('aprende') }}" style="color: #60a5fa; text-decoration: none; font-size: 0.95rem; font-weight: bold; display: flex; align-items: center; gap: 8px;">
            ← Regresar al Centro de Entrenamiento
        </a>
    </div>

    @if(session('status'))
        <div style="background: rgba(16, 185, 129, 0.1); color: #34d399; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; text-align: center; font-weight: bold; border: 1px solid rgba(16, 185, 129, 0.3); box-shadow: 0 0 20px rgba(16, 185, 129, 0.1);">
            {{ session('status') }}
        </div>
    @endif

    <div style="background: rgba(16, 26, 43, 0.6); backdrop-filter: blur(15px); padding: 3rem; border-radius: 24px; text-align: center; border: 1px solid rgba(59, 130, 246, 0.2); box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
        <span style="background: rgba(59, 130, 246, 0.15); color: #60a5fa; padding: 6px 16px; border-radius: 8px; font-weight: bold; font-size: 0.9rem; text-transform: uppercase; border: 1px solid rgba(59, 130, 246, 0.3);">
            {{ $level->badge }}
        </span>
        <h1 style="font-size: 3.5rem; margin-top: 1.5rem; margin-bottom: 1rem; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $level->title }}</h1>
        <p style="color: #cbd5e1; max-width: 700px; margin: 0 auto; line-height: 1.8; font-size: 1.15rem;">
            {{ $level->description }}
        </p>
    </div>

    <h2 style="margin-top: 4rem; margin-bottom: 2rem; border-bottom: 1px solid rgba(59, 130, 246, 0.2); padding-bottom: 15px; color: white; display: flex; align-items: center; gap: 10px;">
        <svg style="width: 1.8rem; height: 1.8rem; color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        Lecciones del Módulo
    </h2>

    @if($lessons->count() > 0)
        <div style="display: flex; flex-direction: column; gap: 20px;">
            @php $allCompleted = true; @endphp
            @foreach($lessons as $lesson)
                @php 
                    $isDone = in_array($lesson->id, $completedLessonIds); 
                    if(!$isDone) $allCompleted = false;
                @endphp
                
                <a href="{{ route('lessons.show', [$level, $lesson]) }}" style="text-decoration: none; color: white; display: block;" class="lesson-row">
                    <div style="background: {{ $isDone ? 'linear-gradient(90deg, rgba(16, 185, 129, 0.05), rgba(16, 26, 43, 0.8))' : 'linear-gradient(90deg, rgba(59, 130, 246, 0.05), rgba(16, 26, 43, 0.8))' }}; 
                                border: 1px solid {{ $isDone ? 'rgba(16, 185, 129, 0.3)' : 'rgba(59, 130, 246, 0.2)' }}; 
                                padding: 1.5rem 2rem; border-radius: 16px; display: flex; align-items: center; justify-content: space-between;
                                transition: all 0.3s ease; position: relative; overflow: hidden; backdrop-filter: blur(10px);">
                        
                        @if($isDone)
                            <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: #10b981;"></div>
                        @else
                            <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: #3b82f6;"></div>
                        @endif

                        <div style="display: flex; align-items: center; gap: 20px;">
                            <div style="background: {{ $isDone ? 'rgba(16, 185, 129, 0.1)' : 'rgba(59, 130, 246, 0.1)' }}; color: {{ $isDone ? '#34d399' : '#60a5fa' }}; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; border: 1px solid {{ $isDone ? 'rgba(16, 185, 129, 0.3)' : 'rgba(59, 130, 246, 0.3)' }};">
                                {{ $lesson->order }}
                            </div>
                            <div>
                                <strong style="font-size: 1.25rem; color: {{ $isDone ? '#34d399' : 'white' }}; display: block; margin-bottom: 5px;">{{ $lesson->title }}</strong>
                                <span style="font-size: 0.85rem; color: #94a3b8; background: rgba(255,255,255,0.05); padding: 4px 10px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                                    Formato: {{ ucfirst($lesson->type) }}
                                </span>
                            </div>
                        </div>
                        
                        <div style="text-align: right;">
                            @if($isDone)
                                <div style="color: #34d399; font-weight: bold; display: flex; align-items: center; gap: 5px; justify-content: flex-end;">
                                    <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Asimilada
                                </div>
                            @else
                                <div style="color: #60a5fa; font-weight: bold; display: flex; align-items: center; gap: 5px; justify-content: flex-end;">
                                    Entrar 
                                    <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div style="background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.1); padding: 4rem; text-align: center; border-radius: 20px;">
            <p style="color: rgba(255,255,255,0.5); font-size: 1.1rem; margin: 0;">Aún no se han detectado transmisiones (lecciones) para este cuadrante.</p>
        </div>
    @endif

</main>

<style>
    .lesson-row > div:hover {
        transform: translateX(10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        border-color: rgba(59, 130, 246, 0.5) !important;
    }
</style>
@endsection
