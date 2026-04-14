@extends('layouts.master')

@section('title', 'Nivel: ' . $level->title)

@section('content')
<main style="padding: 4rem 2rem; max-width: 1000px; margin: auto;">
    
    @if(session('status'))
        <div style="background: rgba(89, 222, 160, 0.1); color: var(--menta); padding: 1rem; border-radius: 10px; margin-bottom: 2rem; text-align: center; font-weight: bold; border: 1px solid rgba(89, 222, 160, 0.3);">
            {{ session('status') }}
        </div>
    @endif

    <div style="background: rgba(255,255,255,0.05); padding: 2.5rem; border-radius: 20px; text-align: center; border: 1px solid rgba(255,255,255,0.1);">
        <span style="background: var(--morado); color: white; padding: 5px 15px; border-radius: 20px; font-weight: bold; font-size: 0.9rem;">
            {{ $level->badge }}
        </span>
        <h1 style="font-size: 2.5rem; margin-top: 1rem; color: var(--menta);">{{ $level->title }}</h1>
        <p style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto; line-height: 1.6;">
            {{ $level->description }}
        </p>
    </div>

    <h2 style="margin-top: 3rem; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px;">Lecciones del Módulo</h2>

    @if($lessons->count() > 0)
        <div style="display: flex; flex-direction: column; gap: 15px;">
            @php $allCompleted = true; @endphp
            @foreach($lessons as $lesson)
                @php 
                    $isDone = in_array($lesson->id, $completedLessonIds); 
                    if(!$isDone) $allCompleted = false;
                @endphp
                
                <a href="{{ route('lessons.show', [$level, $lesson]) }}" style="text-decoration: none; color: white;">
                    <div style="background: {{ $isDone ? 'rgba(89, 222, 160, 0.05)' : 'rgba(0,0,0,0.3)' }}; 
                                border: 1px solid {{ $isDone ? 'var(--menta)' : 'rgba(255,255,255,0.1)' }}; 
                                padding: 1.5rem; border-radius: 15px; display: flex; align-items: center; justify-content: space-between;
                                transition: transform 0.2s, box-shadow 0.2s;"
                         onmouseover="this.style.transform='translateX(5px)'; this.style.boxShadow='0 5px 15px rgba(255,255,255,0.05)'"
                         onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='none'">
                        
                        <div>
                            <span style="color: rgba(255,255,255,0.5); font-size: 0.9rem; margin-right: 15px;">#{{ $lesson->order }}</span>
                            <strong style="font-size: 1.1rem; color: {{ $isDone ? 'var(--menta)' : 'white' }};">{{ $lesson->title }}</strong>
                            <span style="font-size: 0.8rem; margin-left: 15px; background: rgba(255,255,255,0.1); padding: 3px 8px; border-radius: 10px;">
                                {{ ucfirst($lesson->type) }}
                            </span>
                        </div>
                        
                        <div>
                            @if($isDone)
                                <span style="color: var(--menta); font-weight: bold;">✓ Completada</span>
                            @else
                                <span style="color: rgba(255,255,255,0.4);">Pendiente</span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>


    @else
        <p style="text-align: center; color: rgba(255,255,255,0.5); padding: 3rem;">Aún no se han detectado transmisiones (lecciones) para este cuadrante.</p>
    @endif

</main>
@endsection
