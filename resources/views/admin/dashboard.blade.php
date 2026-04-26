@extends('layouts.admin')

@section('title', 'Módulo Central')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
    <!-- Card: Usuarios -->
    <div class="cosmic-card" style="margin-bottom: 0; padding: 1.5rem; border-left: 4px solid var(--azul);">
        <div style="color: var(--lavanda); font-size: 0.8rem; text-transform: uppercase; font-weight: bold; margin-bottom: 10px;">Usuarios</div>
        <div style="font-size: 2rem; font-weight: 800; color: white;">{{ $stats['total_users'] }}</div>
    </div>
    
    <!-- Card: Lecciones -->
    <div class="cosmic-card" style="margin-bottom: 0; padding: 1.5rem; border-left: 4px solid var(--menta);">
        <div style="color: var(--lavanda); font-size: 0.8rem; text-transform: uppercase; font-weight: bold; margin-bottom: 10px;">Lecciones Superadas</div>
        <div style="font-size: 2rem; font-weight: 800; color: white;">{{ $stats['total_lessons_completed'] }}</div>
    </div>

    <!-- Card: Sugerencias -->
    <div class="cosmic-card" style="margin-bottom: 0; padding: 1.5rem; border-left: 4px solid #f59e0b;">
        <div style="color: var(--lavanda); font-size: 0.8rem; text-transform: uppercase; font-weight: bold; margin-bottom: 10px;">Sugerencias Pendientes</div>
        <div style="font-size: 2rem; font-weight: 800; color: white;">{{ $stats['pending_suggestions'] }}</div>
    </div>

    <!-- Card: Eventos -->
    <div class="cosmic-card" style="margin-bottom: 0; padding: 1.5rem; border-left: 4px solid var(--morado);">
        <div style="color: var(--lavanda); font-size: 0.8rem; text-transform: uppercase; font-weight: bold; margin-bottom: 10px;">Próximas Misiones</div>
        <div style="font-size: 2rem; font-weight: 800; color: white;">{{ $stats['upcoming_events'] }}</div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
    <!-- Últimos Usuarios -->
    <div class="cosmic-card" style="margin-bottom: 0;">
        <h3 style="color: var(--menta); margin-top: 0; margin-bottom: 20px;">Últimos Registros</h3>
        <table class="cosmic-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latest_users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d/m/y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-top: 20px; text-align: right;">
            <a href="{{ route('admin.users.index') }}" style="color: var(--lavanda); text-decoration: none; font-size: 0.9rem; font-weight: bold;">Ver todos los usuarios →</a>
        </div>
    </div>

    <!-- Accesos Rápidos -->
    <div class="cosmic-card" style="margin-bottom: 0;">
        <h3 style="color: var(--menta); margin-top: 0; margin-bottom: 20px;">Acciones Rápidas</h3>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            <a href="{{ route('admin.events.create') }}" class="cosmic-btn" style="text-align: center;">Programar Misión</a>
            <a href="{{ route('admin.lessons.create') }}" class="cosmic-btn-sec" style="text-align: center;">Nueva Lección</a>
            <a href="{{ route('admin.fenomenos.create') }}" class="cosmic-btn-sec" style="text-align: center;">Añadir Fenómeno</a>
        </div>
    </div>
</div>
@endsection
