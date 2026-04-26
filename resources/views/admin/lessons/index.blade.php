@extends('layouts.admin')

@section('title', 'Gestión de Lecciones')

@section('content')
<div class="cosmic-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--menta); margin: 0;">Centro de Lecciones</h2>
        <a href="{{ route('admin.lessons.create') }}" class="cosmic-btn">+ Nueva Lección</a>
    </div>

    @forelse($levels as $level)
        <div style="margin-bottom: 40px;">
            <div style="background: rgba(39, 70, 255, 0.1); border-left: 4px solid var(--azul); padding: 10px 20px; border-radius: 0 12px 12px 0; margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                <h3 style="margin: 0; color: white; font-size: 1.1rem;">
                    Nivel: <span style="color: var(--menta);">{{ $level->title }}</span> 
                    <small style="color: var(--lavanda); font-size: 0.8rem; margin-left: 10px; opacity: 0.7;">({{ $level->lessons->count() }} lecciones)</small>
                </h3>
            </div>

            @if($level->lessons->count() > 0)
                <table class="cosmic-table">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Orden</th>
                            <th>Título de la Lección</th>
                            <th>Tipo</th>
                            <th style="width: 150px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($level->lessons as $lesson)
                        <tr>
                            <td><span style="background: rgba(255,255,255,0.05); padding: 2px 8px; border-radius: 4px; font-weight: bold;">#{{ $lesson->order }}</span></td>
                            <td><strong>{{ $lesson->title }}</strong></td>
                            <td>
                                @if($lesson->type == 'video')
                                    <span style="color: #ff4d4d; font-size: 0.85rem;">▶ Video Interactivo</span>
                                @elseif($lesson->type == 'quiz')
                                    <span style="color: #59DEA0; font-size: 0.85rem;">★ Evaluación Quiz</span>
                                @else
                                    <span style="color: #cbd5e1; font-size: 0.85rem;">≡ Lectura Teórica</span>
                                @endif
                            </td>
                            <td class="action-links">
                                <a href="{{ route('admin.lessons.edit', $lesson) }}">Editar</a>
                                <form action="{{ route('admin.lessons.destroy', $lesson) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" style="background:none; border:none; cursor:pointer; font-size:0.9rem; font-weight:bold; padding:0; margin-left: 10px;" onclick="return confirm('¿Seguro que deseas eliminar esta lección?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="color: rgba(255,255,255,0.3); padding-left: 20px; font-style: italic; font-size: 0.9rem;">No hay lecciones asignadas a este nivel todavía.</p>
            @endif
        </div>
    @empty
        <p style="color: rgba(255,255,255,0.5); text-align: center; padding: 2rem 0;">No hay niveles (y por tanto ni lecciones) registrados aún.</p>
    @endforelse
</div>
@endsection
