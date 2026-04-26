@extends('layouts.admin')

@section('title', 'Editar Usuario')

@section('content')
<div class="cosmic-card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="color: var(--menta); margin-top: 0;">Perfil de Comandante</h2>

    @if ($errors->any())
        <div style="background: rgba(255,0,0,0.1); border: 1px solid red; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="color: #ffbba1; margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="cosmic-input">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="cosmic-input">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 25px;">
            <div class="form-group">
                <label for="role">Rol en la Misión</label>
                <select name="role" id="role" required class="cosmic-input">
                    <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>Usuario (Comandante)</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrador (Control)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="xp">Experiencia (XP)</label>
                <input type="number" name="xp" id="xp" value="{{ old('xp', $user->xp) }}" required class="cosmic-input">
            </div>
        </div>

        <div style="background: rgba(255,255,255,0.05); padding: 15px; border-radius: 12px; margin-bottom: 25px; border: 1px solid rgba(255,255,255,0.1);">
            <p style="margin: 0; font-size: 0.85rem; color: #94a3b8;">
                <strong>Estado Actual:</strong> <span style="color: {{ $user->user_level_color }};">{{ $user->user_level }}</span> (Nivel {{ $user->user_level_number }})
            </p>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('admin.users.index') }}" style="color: rgba(255,255,255,0.5); text-decoration: none;">Cancelar</a>
            <button type="submit" class="cosmic-btn">Actualizar Comandante</button>
        </div>
    </form>
</div>
@endsection
