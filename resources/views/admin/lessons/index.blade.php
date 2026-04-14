@extends('layouts.admin')

@section('title', 'Gestión de Lecciones')

@section('content')
<div class="cosmic-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--menta); margin: 0;">Centro de Lecciones</h2>
        <a href="{{ route('admin.lessons.create') }}" class="cosmic-btn">+ Nueva Lección</a>
    </div>

    @if($lessons->count() > 0)
        <table class="cosmic-table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Nivel Perteneciente</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->order }}</td>
                    <td><span style="color: var(--lavanda);">{{ $lesson->level->title ?? 'N/A' }}</span></td>
                    <td><strong>{{ $lesson->title }}</strong></td>
                    <td>
                        @if($lesson->type == 'video')
                            <span style="color: #ff4d4d;">▶ Video</span>
                        @elseif($lesson->type == 'quiz')
                            <span style="color: #59DEA0;">★ Quiz</span>
                        @else
                            <span style="color: #ccc;">≡ Texto</span>
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
        <p style="color: rgba(255,255,255,0.5); text-align: center; padding: 2rem 0;">No hay lecciones registradas aún.</p>
    @endif
</div>
@endsection
