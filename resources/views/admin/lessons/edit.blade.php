@extends('layouts.admin')

@section('title', 'Editar Lección')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Editar Lección</h2>
    <p style="color: rgba(255,255,255,0.6); margin-bottom: 2rem;">Modificando: {{ $lesson->title }}</p>

    @if ($errors->any())
        <div style="color: var(--error); margin-bottom: 1.5rem; background: rgba(255, 77, 77, 0.1); padding: 10px; border-radius: 8px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.lessons.update', $lesson) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="level_id">Nivel Correspondiente</label>
            <select id="level_id" name="level_id" required>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ old('level_id', $lesson->level_id) == $level->id ? 'selected' : '' }}>
                        {{ $level->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Título de Lección</label>
            <input type="text" id="title" name="title" value="{{ old('title', $lesson->title) }}" required>
        </div>

        <div class="form-group">
            <label for="slug">URL Amigable</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $lesson->slug) }}" required>
        </div>

        <div class="form-group">
            <label for="type">Tipo de Lección</label>
            <select id="type" name="type" required>
                <option value="text" {{ old('type', $lesson->type) == 'text' ? 'selected' : '' }}>Texto</option>
                <option value="video" {{ old('type', $lesson->type) == 'video' ? 'selected' : '' }}>Video</option>
                <option value="quiz" {{ old('type', $lesson->type) == 'quiz' ? 'selected' : '' }}>Quiz / Cuestionario</option>
            </select>
        </div>

        <div class="form-group">
            <label for="order">Orden</label>
            <input type="number" id="order" name="order" value="{{ old('order', $lesson->order) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Contenido / HTML / Iframe</label>
            <textarea id="content" name="content" rows="6">{{ old('content', $lesson->content) }}</textarea>
        </div>

        <div style="display: flex; gap: 15px; margin-top: 2rem;">
            <button type="submit" class="cosmic-btn">Actualizar Lección</button>
            <a href="{{ route('admin.lessons.index') }}" class="cosmic-btn-sec">Cancelar</a>
        </div>
    </form>
</div>
@endsection
