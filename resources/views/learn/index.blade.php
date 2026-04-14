@extends('layouts.master')

@section('title', 'NovaCore - Academia Espacial')

@section('content')
    <main class="aprende-container">
        <section class="intro-aprende">
            <h2>Academia NovaCore</h2>
            <p>
                Domina los fundamentos de la astrofísica y la exploración espacial a través de nuestros módulos
                interactivos.
                Elige tu nivel de dificultad y comienza a desbloquear conocimientos cósmicos.
            </p>
        </section>

        <section class="niveles-grid">
            @foreach ($levels as $level)
                <a href="{{ route('levels.show', $level) }}" class="nivel-card">
                    <div class="nivel-badge">{{ $level->badge }}</div>
                    <h3>{{ $level->title }}</h3>
                    <p>{{ $level->description }}</p>
                    <div class="nivel-footer">Comenzar módulo</div>
                </a>
            @endforeach
        </section>
    </main>
@endsection