@extends('layouts.admin')

@section('title', 'Módulo Central')

@section('content')
<!-- Fila de Estadísticas -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
    <div class="cosmic-card" style="margin-bottom: 0; padding: 1.5rem; border-left: 4px solid var(--azul);">
        <div style="color: rgba(255,255,255,0.5); font-size: 0.75rem; text-transform: uppercase; font-weight: bold; margin-bottom: 5px;">Usuarios Totales</div>
        <div style="font-size: 2.2rem; font-weight: 900; color: white; display: flex; align-items: center; gap: 10px;">
            {{ $stats['total_users'] }}
            <span style="font-size: 1rem; color: var(--menta); background: rgba(89, 222, 160, 0.1); padding: 2px 8px; border-radius: 20px;">+10%</span>
        </div>
    </div>
    
    <div class="cosmic-card" style="margin-bottom: 0; padding: 1.5rem; border-left: 4px solid var(--menta);">
        <div style="color: rgba(255,255,255,0.5); font-size: 0.75rem; text-transform: uppercase; font-weight: bold; margin-bottom: 5px;">Lecciones Superadas</div>
        <div style="font-size: 2.2rem; font-weight: 900; color: white;">{{ $stats['total_lessons_completed'] }}</div>
    </div>

    <div class="cosmic-card" style="margin-bottom: 0; padding: 1.5rem; border-left: 4px solid #f59e0b;">
        <div style="color: rgba(255,255,255,0.5); font-size: 0.75rem; text-transform: uppercase; font-weight: bold; margin-bottom: 5px;">Tickets de Sugerencia</div>
        <div style="font-size: 2.2rem; font-weight: 900; color: white;">{{ $stats['pending_suggestions'] }}</div>
    </div>

    <div class="cosmic-card" style="margin-bottom: 0; padding: 1.5rem; border-left: 4px solid var(--morado);">
        <div style="color: rgba(255,255,255,0.5); font-size: 0.75rem; text-transform: uppercase; font-weight: bold; margin-bottom: 5px;">Próximos Eventos</div>
        <div style="font-size: 2.2rem; font-weight: 900; color: white;">{{ $stats['upcoming_events'] }}</div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
    <!-- Columna Principal -->
    <div style="display: flex; flex-direction: column; gap: 30px;">
        
        <!-- Actividad Reciente de Lecciones -->
        <div class="cosmic-card" style="margin-bottom: 0;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="color: var(--lavanda); margin: 0; display: flex; align-items: center; gap: 10px;">
                    Actividad de usuarios: Ultimas lecciones
                </h3>
            </div>
            @if($recent_activity->count() > 0)
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    @foreach($recent_activity as $activity)
                    <div style="background: rgba(255,255,255,0.02); padding: 12px 20px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center; border: 1px solid rgba(255,255,255,0.05);">
                        <div>
                            <span style="color: var(--menta); font-weight: bold;">{{ $activity->user_name }}</span>
                            <span style="color: rgba(255,255,255,0.6); margin: 0 5px;">ha completado</span>
                            <span style="color: white; font-weight: 600;">{{ $activity->lesson_title }}</span>
                        </div>
                        <span style="font-size: 0.8rem; color: rgba(255,255,255,0.3);">{{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</span>
                    </div>
                    @endforeach
                </div>
            @else
                <p style="color: rgba(255,255,255,0.3); font-style: italic;">Sin actividad reciente en los módulos de aprendizaje.</p>
            @endif
        </div>

        <!-- Últimos Usuarios Registrados -->
        <div class="cosmic-card" style="margin-bottom: 0;">
            <h3 style="color: var(--menta); margin-top: 0; margin-bottom: 20px;">Nuevos Alistamientos</h3>
            <table class="cosmic-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha de Ingreso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latest_users as $user)
                    <tr>
                        <td><strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Columna Lateral -->
    <div style="display: flex; flex-direction: column; gap: 30px;">
        
        <!-- Acciones Rápidas -->
        <div class="cosmic-card" style="margin-bottom: 0; background: linear-gradient(to bottom, rgba(39, 70, 255, 0.05), rgba(20, 20, 30, 0.6));">
            <h3 style="color: white; margin-top: 0; margin-bottom: 20px; font-size: 1.1rem;">Panel de Control</h3>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <a href="{{ route('admin.lessons.create') }}" class="cosmic-btn" style="text-align: center; background: var(--azul);">Nueva Lección</a>
                <a href="{{ route('admin.events.create') }}" class="cosmic-btn-sec" style="text-align: center;">Programar Evento</a>
                <a href="{{ route('admin.rewards.create') }}" class="cosmic-btn-sec" style="text-align: center;">Crear Recompensa</a>
                <a href="{{ route('admin.ranks.index') }}" class="cosmic-btn-sec" style="text-align: center;">Gestionar Rangos</a>
            </div>
        </div>

        <!-- Feedback Reciente -->
        <div class="cosmic-card" style="margin-bottom: 0; padding: 1.5rem;">
            <h3 style="color: #f59e0b; margin-top: 0; margin-bottom: 15px; font-size: 1rem;">Sugerencias Recientes</h3>
            @foreach($recent_suggestions as $suggestion)
            <div style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 5px;">
                    <span style="font-size: 0.85rem; font-weight: bold; color: var(--lavanda);">{{ $suggestion->user->name ?? 'Usuario Anónimo' }}</span>
                    <span style="font-size: 0.7rem; color: {{ $suggestion->status == 'pending' ? '#f59e0b' : '#59DEA0' }}; text-transform: uppercase;">{{ $suggestion->status }}</span>
                </div>
                <p style="font-size: 0.85rem; color: rgba(255,255,255,0.7); margin: 0; line-height: 1.4;">{{ Str::limit($suggestion->message, 60) }}</p>
            </div>
            @endforeach
            <a href="{{ route('admin.suggestions.index') }}" style="display: block; text-align: center; font-size: 0.8rem; color: var(--lavanda); text-decoration: none; margin-top: 10px;">Ver todos los tickets →</a>
        </div>

    </div>
</div>
@endsection
