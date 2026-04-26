@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="cosmic-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--menta); margin: 0;">Comandantes Registrados</h2>
    </div>

    @if($users->count() > 0)
        <table class="cosmic-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rango</th>
                    <th>XP</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><strong>{{ $user->name }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span style="color: {{ $user->user_level_color }}; font-weight: bold; font-size: 0.85rem;">
                            {{ $user->user_level }}
                        </span>
                    </td>
                    <td>{{ $user->xp }}</td>
                    <td>
                        <span style="background: {{ $user->role === 'admin' ? 'rgba(255, 235, 59, 0.2)' : 'rgba(255, 255, 255, 0.1)' }}; 
                                     color: {{ $user->role === 'admin' ? '#ffeb3b' : 'white' }}; 
                                     padding: 3px 8px; border-radius: 4px; font-size: 0.8rem; text-transform: uppercase; font-weight: bold;">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="action-links">
                        <a href="{{ route('admin.users.edit', $user) }}">Editar</a>
                        @if($user->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" style="background:none; border:none; cursor:pointer; font-size:0.9rem; font-weight:bold; padding:0; margin-left: 10px;" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div style="margin-top: 20px;">
            {{ $users->links() }}
        </div>
    @else
        <p style="color: rgba(255,255,255,0.5); text-align: center; padding: 2rem 0;">No hay usuarios registrados en el sistema.</p>
    @endif
</div>
@endsection
