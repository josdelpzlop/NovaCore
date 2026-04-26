@extends('layouts.admin')

@section('title', 'Editar Rango')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Ajustar Escalafón</h2>

    <form action="{{ route('admin.ranks.update', $rank) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group" style="margin-bottom: 15px;">
            <label>Título del Rango</label>
            <input type="text" name="title" value="{{ $rank->title }}" required class="cosmic-input">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
            <div class="form-group">
                <label>Número/ID Nivel</label>
                <input type="text" name="number" value="{{ $rank->number }}" required class="cosmic-input">
            </div>
            <div class="form-group">
                <label>XP Mínima</label>
                <input type="number" name="min_xp" value="{{ $rank->min_xp }}" required class="cosmic-input">
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label>Color Identificativo (Hex)</label>
            <input type="color" name="color" value="{{ $rank->color }}" style="height: 50px; cursor: pointer;" class="cosmic-input">
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('admin.ranks.index') }}" style="color: rgba(255,255,255,0.5); text-decoration: none;">Cancelar</a>
            <button type="submit" class="cosmic-btn">Actualizar Rango</button>
        </div>
    </form>
</div>
@endsection
