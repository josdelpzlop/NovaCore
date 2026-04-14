@extends('layouts.admin')

@section('title', 'Editar Nivel')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Editar Nivel Educativo</h2>
    <p style="color: rgba(255,255,255,0.6); margin-bottom: 2rem;">Modificando: {{ $level->title }}</p>

    @if ($errors->any())
        <div style="color: var(--error); margin-bottom: 1.5rem; background: rgba(255, 77, 77, 0.1); padding: 10px; border-radius: 8px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.levels.update', $level) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Título del Nivel</label>
            <input type="text" id="title" name="title" value="{{ old('title', $level->title) }}" required>
        </div>

        <div class="form-group">
            <label for="slug">URL Amigable (Slug)</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $level->slug) }}" required>
        </div>

        <div class="form-group">
            <label for="badge">Insignia</label>
            <input type="text" id="badge" name="badge" value="{{ old('badge', $level->badge) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description', $level->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="url">URL Destino (Opcional)</label>
            <input type="text" id="url" name="url" value="{{ old('url', $level->url) }}">
        </div>

        <div style="display: flex; gap: 15px; margin-top: 2rem;">
            <button type="submit" class="cosmic-btn">Actualizar Nivel</button>
            <a href="{{ route('admin.levels.index') }}" class="cosmic-btn-sec">Cancelar</a>
        </div>
    </form>
</div>
@endsection
