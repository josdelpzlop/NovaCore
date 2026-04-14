@extends('layouts.master')

@section('title', $lesson->title . ' - NovaCore')

@section('content')
<main style="padding: 2rem; max-width: 800px; margin: auto; min-height: 80vh; display: flex; flex-direction: column;">
    
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('levels.show', $level) }}" style="color: rgba(255,255,255,0.5); text-decoration: none; font-size: 0.9rem;">
            ← Volver a {{ $level->title }}
        </a>
    </div>

    <!-- Lesson Header -->
    <div style="margin-bottom: 3rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 2rem;">
        <span style="color: var(--menta); font-weight: bold; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px;">
            Lección {{ $lesson->order }}
        </span>
        <h1 style="font-size: 2.5rem; margin: 0.5rem 0; color: white;">{{ $lesson->title }}</h1>
        
        @if($isCompleted)
            <div style="display: inline-block; background: rgba(89, 222, 160, 0.1); color: var(--menta); padding: 5px 10px; border-radius: 8px; font-size: 0.8rem; border: 1px solid rgba(89, 222, 160, 0.3);">
                ✓ Ya has asimilado este conocimiento
            </div>
        @endif
    </div>

    <!-- Lesson Content Area -->
    <div style="flex-grow: 1; font-size: 1.1rem; line-height: 1.8; color: rgba(255,255,255,0.85);" class="lesson-content">
        @if($lesson->type == 'video')
            <!-- Placeholder for video iframe logic if necessary, or just render raw -->
            <div style="background: rgba(0,0,0,0.5); border-radius: 15px; overflow: hidden; margin-bottom: 2rem;">
                {!! $lesson->content !!}
            </div>
        @else
            {!! $lesson->content !!}
        @endif
    </div>

    <!-- Action Bar -->
    <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1); text-align: center;">
        <form method="POST" action="{{ route('lessons.complete', $lesson) }}">
            @csrf
            
            <button type="submit" 
                    style="background: linear-gradient(45deg, var(--morado), var(--azul)); color: white; border: none; padding: 15px 40px; border-radius: 30px; font-weight: 800; font-size: 1.1rem; cursor: pointer; transition: all 0.3s; box-shadow: 0 10px 20px rgba(39, 70, 255, 0.3);"
                    onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 25px rgba(39, 70, 255, 0.5)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(39, 70, 255, 0.3)'">
                {{ $isCompleted ? 'Volver a Confirmar Conocimiento' : 'Misión Cumplida: Continuar' }}
            </button>
            <p style="color: rgba(255,255,255,0.4); font-size: 0.8rem; margin-top: 15px;">Al continuar, tu progreso quedará guardado en los registros estelares.</p>
        </form>
    </div>

</main>
@endsection
