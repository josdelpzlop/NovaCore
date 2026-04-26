@extends('layouts.admin')

@section('title', 'Rangos de Prestigio')

@section('content')
<div class="cosmic-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--menta); margin: 0;">Escala de Prestigio</h2>
        <a href="{{ route('admin.ranks.create') }}" class="cosmic-btn">Añadir Rango</a>
    </div>

    <table class="cosmic-table">
        <thead>
            <tr>
                <th>Nivel</th>
                <th>Título</th>
                <th>XP Requerida</th>
                <th>Color Identificativo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranks as $rank)
            <tr>
                <td><strong>{{ $rank->number }}</strong></td>
                <td style="color: {{ $rank->color }}; font-weight: 800;">{{ $rank->title }}</td>
                <td>{{ $rank->min_xp }} XP</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 20px; height: 20px; border-radius: 4px; background: {{ $rank->color }}; border: 1px solid rgba(255,255,255,0.2);"></div>
                        <code>{{ $rank->color }}</code>
                    </div>
                </td>
                <td class="action-links">
                    <a href="{{ route('admin.ranks.edit', $rank) }}">Editar</a>
                    <form action="{{ route('admin.ranks.destroy', $rank) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete" style="background:none; border:none; cursor:pointer; font-size:0.9rem; font-weight:bold; padding:0; margin-left: 10px;" onclick="return confirm('¿Eliminar este rango?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p style="margin-top: 20px; color: #94a3b8; font-size: 0.85rem;">
        * El sistema asigna automáticamente el rango al usuario comparando su XP con el valor "XP Requerida" más alto que no supere su progreso actual.
    </p>
</div>
@endsection
