@extends('layouts.admin')

@section('title', 'Gestión de Eventos')

@section('content')
<div class="cosmic-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--menta); margin: 0;">Misiones y Eventos</h2>
        <a href="{{ route('admin.events.create') }}" class="cosmic-btn">+ Nuevo Evento</a>
    </div>

    @if($events->count() > 0)
        <table class="cosmic-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Recompensa XP</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->event_date->format('d/m/Y H:i') }}</td>
                    <td><strong>{{ $event->title }}</strong></td>
                    <td>
                        <span style="background: rgba(104,14,188,0.3); padding: 4px 8px; border-radius: 4px; font-size: 0.8rem; text-transform: uppercase;">
                            {{ $event->status }}
                        </span>
                    </td>
                    <td>{{ $event->xp_reward }} XP</td>
                    <td class="action-links">
                        <a href="{{ route('admin.events.edit', $event) }}">Editar</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" style="background:none; border:none; cursor:pointer; font-size:0.9rem; font-weight:bold; padding:0; margin-left: 10px;" onclick="return confirm('¿Seguro que deseas eliminar este evento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: rgba(255,255,255,0.5); text-align: center; padding: 2rem 0;">Aún no hay eventos registrados en la estación espacial.</p>
    @endif
</div>
@endsection
