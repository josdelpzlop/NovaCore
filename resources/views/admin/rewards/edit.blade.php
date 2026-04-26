@extends('layouts.admin')

@section('title', 'Editar Recompensa')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Editar Recompensa</h2>

    @if ($errors->any())
        <div style="background: rgba(255,0,0,0.1); border: 1px solid red; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="color: #ffbba1; margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.rewards.update', $reward) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Nombre del Título</label>
            <input type="text" name="name" id="name" value="{{ old('name', $reward->name) }}" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Descripción (Cómo se consigue)</label>
            <textarea name="description" id="description" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white; min-height: 80px;">{{ old('description', $reward->description) }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
            <div class="form-group">
                <label for="color" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Color Fondo (HEX)</label>
                <input type="color" name="color" id="color" value="{{ old('color', $reward->color) }}" required style="width: 100%; height: 40px; border-radius: 8px; background: transparent; border: 1px solid rgba(255,255,255,0.2); cursor: pointer;">
            </div>
            <div class="form-group">
                <label for="text_color" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Color Texto/Icono (HEX)</label>
                <input type="color" name="text_color" id="text_color" value="{{ old('text_color', $reward->text_color) }}" required style="width: 100%; height: 40px; border-radius: 8px; background: transparent; border: 1px solid rgba(255,255,255,0.2); cursor: pointer;">
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="icon" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Código SVG del Icono</label>
            <textarea name="icon" id="icon" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white; min-height: 100px; font-family: monospace; font-size: 0.8rem;">{{ old('icon', $reward->icon) }}</textarea>
            <small style="color: rgba(255,255,255,0.4);">Pega aquí el código <svg>...</svg> del icono.</small>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 15px; margin-bottom: 25px;">
            <div class="form-group">
                <label for="requirement_type" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Tipo de Requisito</label>
                <select name="requirement_type" id="requirement_type" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
                    <option value="lessons" {{ old('requirement_type', $reward->requirement_type) == 'lessons' ? 'selected' : '' }}>Lecciones Completadas</option>
                    <option value="events" {{ old('requirement_type', $reward->requirement_type) == 'events' ? 'selected' : '' }}>Eventos Asistidos</option>
                    <option value="level_max" {{ old('requirement_type', $reward->requirement_type) == 'level_max' ? 'selected' : '' }}>Alcanzar Nivel Máximo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="requirement_value" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Cantidad</label>
                <input type="number" name="requirement_value" id="requirement_value" value="{{ old('requirement_value', $reward->requirement_value) }}" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('admin.rewards.index') }}" style="color: rgba(255,255,255,0.5); text-decoration: none;">Cancelar</a>
            <button type="submit" class="cosmic-btn">Actualizar Recompensa</button>
        </div>
    </form>
</div>
@endsection
