@extends('layouts.admin')

@section('title', 'Gestión de Fenómenos')

@section('content')
<div class="cosmic-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--menta); margin: 0;">Gestión de Fenómenos</h2>
        <a href="{{ route('admin.fenomenos.create') }}" class="cosmic-btn">Crear Nuevo Fenómeno</a>
    </div>

    @if (session('success'))
        <div style="background: rgba(0,255,0,0.1); border: 1px solid green; padding: 10px; border-radius: 8px; margin-bottom: 20px; color: #a1ffb5;">
            {{ session('success') }}
        </div>
    @endif

    <table class="cosmic-table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fenomenos as $fenomeno)
            <tr>
                <td>
                    @if($fenomeno->image_path)
                        <img src="{{ asset('storage/' . $fenomeno->image_path) }}" alt="{{ $fenomeno->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2);">
                    @else
                        <div style="width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 8px; display: flex; justify-content: center; align-items: center; color: rgba(255,255,255,0.5); font-size: 0.8rem;">Sin img</div>
                    @endif
                </td>
                <td style="font-weight: bold;">{{ $fenomeno->title }}</td>
                <td>{{ $fenomeno->date ? $fenomeno->date->format('d/m/Y') : 'N/A' }}</td>
                <td class="action-links">
                    <a href="{{ route('admin.fenomenos.edit', $fenomeno) }}">Editar</a>
                    <form action="{{ route('admin.fenomenos.destroy', $fenomeno) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este fenómeno?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete" style="background: none; border: none; cursor: pointer; font-size: 1rem; font-weight: bold;">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @if($fenomenos->isEmpty())
        <p style="text-align: center; color: #94a3b8; padding: 30px;">No hay fenómenos registrados. ¡Crea el primero!</p>
    @endif
</div>
@endsection
