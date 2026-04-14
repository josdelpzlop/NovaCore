@extends('layouts.admin')

@section('title', 'Nueva Lección')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Añadir Lección</h2>
    <p style="color: rgba(255,255,255,0.6); margin-bottom: 2rem;">Asigna nuevo material a un nivel existente.</p>

    @if ($errors->any())
        <div style="color: var(--error); margin-bottom: 1.5rem; background: rgba(255, 77, 77, 0.1); padding: 10px; border-radius: 8px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.lessons.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="level_id">Nivel Correspondiente</label>
            <select id="level_id" name="level_id" required>
                <option value="">-- Selecciona un Nivel --</option>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>
                        {{ $level->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Título de Lección</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="slug">URL Amigable (Ej: que-es-el-sol)</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required>
        </div>

        <div class="form-group">
            <label for="type">Tipo de Lección</label>
            <select id="type" name="type" required>
                <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Texto</option>
                <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
                <option value="quiz" {{ old('type') == 'quiz' ? 'selected' : '' }}>Quiz / Cuestionario</option>
            </select>
        </div>

        <div class="form-group">
            <label for="order">Orden (Número para ordenar)</label>
            <input type="number" id="order" name="order" value="{{ old('order', 0) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Contenido / HTML / Iframe</label>
            <textarea id="content" name="content" rows="6">{{ old('content') }}</textarea>
        </div>

        <div style="display: flex; gap: 15px; margin-top: 2rem;">
            <button type="submit" class="cosmic-btn">Guardar Lección</button>
            <a href="{{ route('admin.lessons.index') }}" class="cosmic-btn-sec">Cancelar</a>
        </div>
    </form>
</div>
@endsection
