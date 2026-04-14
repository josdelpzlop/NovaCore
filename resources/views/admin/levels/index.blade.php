@extends('layouts.admin')

@section('title', 'Gestión de Niveles')

@section('content')
<div class="cosmic-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--menta); margin: 0;">Niveles Educativos</h2>
        <a href="{{ route('admin.levels.create') }}" class="cosmic-btn">+ Nuevo Nivel</a>
    </div>

    @if($levels->count() > 0)
        <table class="cosmic-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Insignia</th>
                    <th>Link (URL)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($levels as $level)
                <tr>
                    <td>{{ $level->id }}</td>
                    <td><strong>{{ $level->title }}</strong></td>
                    <td><span style="background: rgba(104,14,188,0.3); padding: 4px 8px; border-radius: 4px; font-size: 0.8rem;">{{ $level->badge }}</span></td>
                    <td><a href="{{ $level->url }}" target="_blank" style="color: var(--lavanda);">Ver</a></td>
                    <td class="action-links">
                        <a href="{{ route('admin.levels.edit', $level) }}">Editar</a>
                        <form action="{{ route('admin.levels.destroy', $level) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" style="background:none; border:none; cursor:pointer; font-size:0.9rem; font-weight:bold; padding:0; margin-left: 10px;" onclick="return confirm('¿Seguro que deseas eliminar este nivel?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: rgba(255,255,255,0.5); text-align: center; padding: 2rem 0;">Aún no hay niveles registrados en la estación espacial.</p>
    @endif
</div>
@endsection
