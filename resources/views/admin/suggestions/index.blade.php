@extends('layouts.admin')

@section('title', 'Buzón de Sugerencias')

@section('content')
<div class="cosmic-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--menta); margin: 0;">Transmisiones de Usuario</h2>
    </div>

    @if($suggestions->count() > 0)
        <div style="display: flex; flex-direction: column; gap: 20px;">
            @foreach($suggestions as $suggestion)
                <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; padding: 25px; position: relative;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                        <div style="display: flex; gap: 15px; align-items: center;">
                            <div style="width: 45px; height: 45px; background: var(--morado); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 800; color: white; border: 1px solid rgba(255,255,255,0.1);">
                                {{ substr($suggestion->user->name ?? 'A', 0, 1) }}
                            </div>
                            <div>
                                <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--lavanda);">
                                    {{ $suggestion->created_at->format('d M, Y H:i') }}
                                </span>
                                <h3 style="margin: 2px 0; color: white; font-size: 1.3rem;">{{ $suggestion->subject }}</h3>
                                <span style="font-size: 0.9rem; color: #94a3b8;">
                                    Reporte de: <strong style="color: white;">{{ $suggestion->user->name ?? 'Anónimo' }}</strong> 
                                    <span style="opacity: 0.6; font-size: 0.8rem;">({{ $suggestion->user->email ?? 'N/A' }})</span>
                                </span>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('admin.suggestions.update', $suggestion) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()" style="background: rgba(0,0,0,0.3); color: white; border: 1px solid rgba(255,255,255,0.2); padding: 5px 10px; border-radius: 6px; font-size: 0.85rem; cursor: pointer;">
                                    <option value="pending" {{ $suggestion->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="reviewed" {{ $suggestion->status === 'reviewed' ? 'selected' : '' }}>Revisado</option>
                                    <option value="completed" {{ $suggestion->status === 'completed' ? 'selected' : '' }}>Completado</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    
                    <p style="color: #cbd5e1; line-height: 1.6; background: rgba(0,0,0,0.2); padding: 15px; border-radius: 10px; border-left: 3px solid var(--menta); margin-left: 60px;">
                        {{ $suggestion->message }}
                    </p>

                    <div style="margin-top: 15px; display: flex; justify-content: flex-end;">
                        <form action="{{ route('admin.suggestions.destroy', $suggestion) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" style="background: none; border: none; font-size: 0.85rem; font-weight: bold; cursor: pointer;" onclick="return confirm('¿Eliminar esta sugerencia?')">Borrar Reporte</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div style="margin-top: 25px;">
            {{ $suggestions->links() }}
        </div>
    @else
        <p style="color: rgba(255,255,255,0.5); text-align: center; padding: 2rem 0;">No hay sugerencias en el buzón todavía.</p>
    @endif
</div>
@endsection
