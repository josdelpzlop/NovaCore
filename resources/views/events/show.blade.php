@extends('layouts.master')

@section('title', $event->title . ' - NovaCore Eventos')

@section('content')
<section class="lesson-section" style="padding: 100px 20px 50px; min-height: 80vh; display: flex; justify-content: center; align-items: flex-start;">
    
    <div class="lesson-container" style="
        background: rgba(16, 26, 43, 0.7);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        width: 100%;
        max-width: 800px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        color: white;
    ">
        @if(session('success'))
            <div style="background: rgba(28,200,138,0.2); border: 1px solid rgba(28,200,138,0.5); color: #1cc88a; padding: 15px; border-radius: 8px; margin-bottom: 25px; text-align: center; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div style="background: rgba(78,115,223,0.2); border: 1px solid rgba(78,115,223,0.5); color: #4e73df; padding: 15px; border-radius: 8px; margin-bottom: 25px; text-align: center; font-weight: bold;">
                {{ session('info') }}
            </div>
        @endif

        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 20px;">
            <div>
                <a href="{{ route('events.index') }}" style="color: var(--lavanda); text-decoration: none; font-size: 0.9rem;">&larr; Volver a Eventos</a>
                <h1 style="font-size: 2.5rem; margin: 15px 0 10px; background: -webkit-linear-gradient(#fff, #1cc88a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $event->title }}</h1>
                <div style="display: flex; gap: 15px; color: #94a3b8; font-size: 0.9rem;">
                    <span>📅 {{ $event->event_date->format('d M, Y - H:i') }}</span>
                    <span>✨ Recompensa: {{ $event->xp_reward }} XP</span>
                </div>
            </div>
            
            <span style="background: rgba(104,14,188,0.3); padding: 8px 15px; border-radius: 8px; font-weight: bold; border: 1px solid rgba(104,14,188,0.6); text-transform: uppercase;">
                {{ $event->status == 'upcoming' ? 'Próximo' : ($event->status == 'ongoing' ? 'En Vivo' : 'Completado') }}
            </span>
        </div>

        <div class="lesson-content" style="font-size: 1.1rem; line-height: 1.8; color: #cbd5e1; margin-bottom: 40px;">
            <p>{{ $event->description }}</p>
            
            @if($event->location)
                <div style="margin-top: 30px; padding: 20px; background: rgba(0,0,0,0.3); border-radius: 10px; border-left: 4px solid #4e73df;">
                    <strong style="color: white; display: block; margin-bottom: 10px;">📍 Ubicación / Enlace de Ingreso:</strong>
                    @if(filter_var($event->location, FILTER_VALIDATE_URL))
                        <a href="{{ $event->location }}" target="_blank" style="color: #4e73df; text-decoration: underline; word-break: break-all;">{{ $event->location }}</a>
                    @else
                        <span style="color: var(--menta);">{{ $event->location }}</span>
                    @endif
                </div>
            @endif
        </div>

        <div class="lesson-actions" style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 30px; text-align: center;">
            @auth
                @if($hasAttended)
                    <button disabled style="background: rgba(28,200,138,0.2); border: 1px solid rgba(28,200,138,0.5); color: #1cc88a; padding: 15px 40px; font-size: 1.2rem; border-radius: 30px; font-weight: bold; cursor: not-allowed;">
                        ✅ Ya estás inscrito en esta misión
                    </button>
                    <p style="margin-top: 15px; color: #94a3b8; font-size: 0.9rem;">Prepara tus sistemas para el evento.</p>
                @else
                    @if($event->status == 'completed')
                        <button disabled style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #94a3b8; padding: 15px 40px; font-size: 1.2rem; border-radius: 30px; cursor: not-allowed;">
                            El evento ha finalizado
                        </button>
                    @else
                        <form action="{{ route('events.attend', $event) }}" method="POST">
                            @csrf
                            <button type="submit" class="cosmic-btn" style="background: linear-gradient(90deg, #4e73df, #224abe); padding: 15px 50px; font-size: 1.2rem; border-radius: 30px; border: none; cursor: pointer; color: white; box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4); transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                🚀 Inscribirme a la Misión
                            </button>
                        </form>
                    @endif
                @endif
            @else
                <div style="background: rgba(0,0,0,0.3); padding: 20px; border-radius: 10px; border: 1px dashed rgba(255,255,255,0.2);">
                    <p style="margin-bottom: 15px; color: #cbd5e1;">Para unirte a esta misión necesitas autenticarte en los sistemas.</p>
                    <a href="{{ route('login') }}" class="btn-login" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); padding: 10px 20px; border-radius: 8px; text-decoration: none; color: white; transition: background 0.3s;">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" style="color: var(--lavanda); margin-left: 15px; text-decoration: none;">Crear Cuenta</a>
                </div>
            @endauth
        </div>

    </div>
</section>
@endsection
