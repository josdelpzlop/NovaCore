@extends('layouts.admin')

@section('title', 'Nuevo Rango')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Configurar Nuevo Rango</h2>

    <form action="{{ route('admin.ranks.store') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Título del Rango</label>
            <input type="text" name="title" required placeholder="Ej. Almirante Galáctico" class="cosmic-input">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
            <div class="form-group">
                <label>Número/ID Nivel</label>
                <input type="text" name="number" required placeholder="Ej. 5 o MAX" class="cosmic-input">
            </div>
            <div class="form-group">
                <label>XP Mínima</label>
                <input type="number" name="min_xp" required placeholder="2500" class="cosmic-input">
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label>Color Identificativo (Hex)</label>
            <input type="color" name="color" value="#3b82f6" style="height: 50px; cursor: pointer;" class="cosmic-input">
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('admin.ranks.index') }}" style="color: rgba(255,255,255,0.5); text-decoration: none;">Cancelar</a>
            <button type="submit" class="cosmic-btn">Guardar Rango</button>
        </div>
    </form>
</div>
@endsection
