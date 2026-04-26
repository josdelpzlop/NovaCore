@extends('layouts.admin')

@section('title', 'Crear Evento')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Crear Nuevo Evento</h2>

    @if ($errors->any())
        <div style="background: rgba(255,0,0,0.1); border: 1px solid red; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="color: #ffbba1; margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="title" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Título del Evento</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Descripción</label>
            <textarea name="description" id="description" class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white; min-height: 100px;">{{ old('description') }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="event_date" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Fecha y Hora</label>
            <input type="datetime-local" name="event_date" id="event_date" value="{{ old('event_date') }}" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="location" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Ubicación o Enlace (Opcional)</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}" class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="image" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Imagen del Evento (Opcional)</label>
            <input type="file" name="image" id="image" accept="image/*" class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="xp_reward" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Recompensa (XP / Puntos)</label>
            <input type="number" name="xp_reward" id="xp_reward" value="{{ old('xp_reward', 0) }}" class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="status" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Estado del Evento</label>
            <select name="status" id="status" class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
                <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Próximo (Upcoming)</option>
                <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>En Progreso (Ongoing)</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completado (Completed)</option>
            </select>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('admin.events.index') }}" style="color: rgba(255,255,255,0.5); text-decoration: none;">Cancelar</a>
            <button type="submit" class="cosmic-btn">Guardar Evento</button>
        </div>
    </form>
</div>
@endsection
