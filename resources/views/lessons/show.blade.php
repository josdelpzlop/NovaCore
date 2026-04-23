@extends('layouts.master')

@section('title', $lesson->title . ' - NovaCore')

@section('content')
    <!-- Fondo Cósmico Azul -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #1e3a8a 0%, transparent 70%); filter: blur(100px); opacity: 0.3; animation: pulseGlow 8s infinite alternate;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, #0284c7 0%, transparent 70%); filter: blur(120px); opacity: 0.2; animation: pulseGlow 10s infinite alternate-reverse;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #3b82f6 0%, transparent 70%); filter: blur(100px); opacity: 0.2; animation: pulseGlow 12s infinite alternate;"></div>
        
        <div style="position: absolute; top: 0; left: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(59,130,246,0.15), transparent);"></div>
        <div style="position: absolute; top: 0; right: 4%; width: 1px; height: 100%; background: linear-gradient(to bottom, transparent, rgba(59,130,246,0.15), transparent);"></div>
    </div>

<main style="padding: 100px 5% 50px; max-width: 850px; margin: auto; min-height: 80vh; display: flex; flex-direction: column;">
    
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('levels.show', $level) }}" style="color: #60a5fa; text-decoration: none; font-size: 0.95rem; font-weight: bold; display: flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color='#93c5fd'" onmouseout="this.style.color='#60a5fa'">
            ← Volver a {{ $level->title }}
        </a>
    </div>

    <!-- Lesson Header -->
    <div style="margin-bottom: 3rem; border-bottom: 1px solid rgba(59, 130, 246, 0.2); padding-bottom: 2rem;">
        <span style="display: inline-block; background: rgba(59, 130, 246, 0.15); color: #60a5fa; padding: 4px 12px; border-radius: 6px; font-weight: bold; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px; border: 1px solid rgba(59, 130, 246, 0.3); margin-bottom: 10px;">
            Lección {{ $lesson->order }}
        </span>
        <h1 style="font-size: 3rem; margin: 0 0 1rem 0; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $lesson->title }}</h1>
        
        @if($isCompleted)
            <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(16, 185, 129, 0.1); color: #34d399; padding: 6px 14px; border-radius: 8px; font-size: 0.85rem; border: 1px solid rgba(16, 185, 129, 0.3); font-weight: bold;">
                <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Conocimiento Asimilado
            </div>
        @endif
    </div>

    <!-- Lesson Content Area -->
    <div style="flex-grow: 1; font-size: 1.15rem; line-height: 1.9; color: #cbd5e1; background: rgba(16, 26, 43, 0.6); backdrop-filter: blur(15px); padding: 40px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.05); box-shadow: 0 10px 40px rgba(0,0,0,0.3);" class="lesson-content">
        @if($lesson->type == 'video')
            <div style="background: rgba(0,0,0,0.8); border-radius: 15px; overflow: hidden; margin-bottom: 2rem; border: 1px solid rgba(59, 130, 246, 0.3); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                {!! $lesson->content !!}
            </div>
        @else
            {!! $lesson->content !!}
        @endif
    </div>

    <!-- Action Bar -->
    <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px dashed rgba(59, 130, 246, 0.3); text-align: center;">
        <form method="POST" action="{{ route('lessons.complete', $lesson) }}">
            @csrf
            
            <button type="submit" 
                    style="background: linear-gradient(45deg, #1e3a8a, #3b82f6); color: white; border: 1px solid #60a5fa; padding: 15px 40px; border-radius: 30px; font-weight: 800; font-size: 1.1rem; cursor: pointer; transition: all 0.3s; box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);"
                    onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 25px rgba(59, 130, 246, 0.4)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(59, 130, 246, 0.2)'">
                {{ $isCompleted ? 'Volver a Confirmar Conocimiento' : 'Misión Cumplida: Continuar' }}
            </button>
            <p style="color: #64748b; font-size: 0.85rem; margin-top: 15px;">Al continuar, tu progreso quedará guardado permanentemente en los registros estelares.</p>
        </form>
    </div>

</main>
@endsection
