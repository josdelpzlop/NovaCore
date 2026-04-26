@extends('layouts.admin')

@section('title', 'Editar Fenómeno')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Editar Fenómeno</h2>

    @if ($errors->any())
        <div style="background: rgba(255,0,0,0.1); border: 1px solid red; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="color: #ffbba1; margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.fenomenos.update', $fenomeno) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="title" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Título del Fenómeno</label>
            <input type="text" name="title" id="title" value="{{ old('title', $fenomeno->title) }}" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Descripción (Explicación)</label>
            <textarea name="description" id="description" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white; min-height: 150px;">{{ old('description', $fenomeno->description) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="date" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Fecha del Descubrimiento</label>
            <input type="date" name="date" id="date" value="{{ old('date', $fenomeno->date ? $fenomeno->date->format('Y-m-d') : '') }}" required class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="image" style="display: block; margin-bottom: 5px; color: var(--lavanda);">Imagen del Fenómeno (Dejar en blanco para mantener actual)</label>
            @if($fenomeno->image_path)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $fenomeno->image_path) }}" alt="Imagen actual" style="max-width: 200px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2);">
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*" class="cosmic-input" style="width: 100%; padding: 10px; border-radius: 8px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); color: white;">
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('admin.fenomenos.index') }}" style="color: rgba(255,255,255,0.5); text-decoration: none;">Cancelar</a>
            <button type="submit" class="cosmic-btn">Actualizar Fenómeno</button>
        </div>
    </form>
</div>
@endsection
