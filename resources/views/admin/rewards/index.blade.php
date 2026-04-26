@extends('layouts.admin')

@section('title', 'Gestión de Recompensas')

@section('content')
<div class="cosmic-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--menta); margin: 0;">Sala de Recompensas y Títulos</h2>
        <a href="{{ route('admin.rewards.create') }}" class="cosmic-btn">+ Nueva Recompensa</a>
    </div>

    @if($rewards->count() > 0)
        <table class="cosmic-table">
            <thead>
                <tr>
                    <th>Icono</th>
                    <th>Título</th>
                    <th>Requisito</th>
                    <th>Valor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rewards as $reward)
                <tr>
                    <td>
                        <div style="width: 2rem; height: 2rem; color: {{ $reward->text_color }};">
                            {!! $reward->icon !!}
                        </div>
                    </td>
                    <td>
                        <strong style="color: {{ $reward->text_color }}; background: {{ $reward->color }}33; padding: 4px 8px; border-radius: 4px;">
                            {{ $reward->name }}
                        </strong>
                    </td>
                    <td>
                        <span style="font-size: 0.8rem; text-transform: uppercase; color: rgba(255,255,255,0.7);">
                            {{ str_replace('_', ' ', $reward->requirement_type) }}
                        </span>
                    </td>
                    <td>{{ $reward->requirement_value }}</td>
                    <td class="action-links">
                        <a href="{{ route('admin.rewards.edit', $reward) }}">Editar</a>
                        <form action="{{ route('admin.rewards.destroy', $reward) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" style="background:none; border:none; cursor:pointer; font-size:0.9rem; font-weight:bold; padding:0; margin-left: 10px;" onclick="return confirm('¿Seguro que deseas eliminar esta recompensa?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: rgba(255,255,255,0.5); text-align: center; padding: 2rem 0;">No hay recompensas configuradas en la base de datos.</p>
    @endif
</div>
@endsection
