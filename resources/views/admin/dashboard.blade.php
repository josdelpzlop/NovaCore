@extends('layouts.admin')

@section('title', 'Módulo Central')

@section('content')
<div class="cosmic-card">
    <h2 style="color: var(--menta); margin-top: 0;">¡Sistema En Línea!</h2>
    <p style="color: rgba(255,255,255,0.7); line-height: 1.6;">
        Bienvenido al centro de mando de NovaCore de nivel Administrador.<br>
        Desde aquí podrás gestionar la estructura educativa (Niveles y Lecciones) que los usuarios experimentarán.
    </p>

    <div style="display: flex; gap: 20px; margin-top: 30px;">
        <a href="{{ route('admin.levels.index') ?? '#' }}" class="cosmic-btn">Gestionar Niveles</a>
        <a href="{{ route('admin.lessons.index') ?? '#' }}" class="cosmic-btn-sec">Gestionar Lecciones</a>
    </div>
</div>

<div class="cosmic-card">
    <h3 style="color: var(--lavanda); margin-top: 0; font-size: 1.1rem; text-transform: uppercase;">Estado del Sistema</h3>
    <table class="cosmic-table">
        <tr>
            <td style="width: 200px;"><strong>Niveles Activos:</strong></td>
            <td><span style="color: var(--menta);">{{ \App\Models\Level::count() }}</span></td>
        </tr>
        <tr>
            <td><strong>Usuarios Totales:</strong></td>
            <td><span style="color: var(--menta);">{{ \App\Models\User::count() }}</span></td>
        </tr>
    </table>
</div>
@endsection
