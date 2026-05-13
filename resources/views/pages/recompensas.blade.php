@extends('layouts.master')

@section('title', 'Recompensas | NovaCore')

@section('content')
    <!-- Fondo decorativo estático - Recompensas (Oro/Amarillo/Ámbar) -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; pointer-events: none; z-index: -1;">
        <div style="position: absolute; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #eab308 0%, transparent 70%); filter: blur(100px); opacity: 0.1;"></div>
        <div style="position: absolute; top: 30%; right: -15%; width: 60vw; height: 60vw; background: radial-gradient(circle, #f59e0b 0%, transparent 70%); filter: blur(120px); opacity: 0.08;"></div>
        <div style="position: absolute; bottom: -20%; left: 10%; width: 50vw; height: 50vw; background: radial-gradient(circle, #d97706 0%, transparent 70%); filter: blur(100px); opacity: 0.06;"></div>
    </div>

<div class="recompensas-container" style="max-width: 1400px; margin: 3rem auto; padding: 100px 5% 50px; min-height: 70vh;">
    
    <!-- Texto de Introducción Estilizado -->
    <section style="text-align: center; margin-bottom: 4rem;">
        <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.3); color: #fbbf24; padding: 6px 18px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 2px;">
            <svg style="width: 1.2rem; height: 1.2rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
            Sala de Trofeos
        </div>
        <h2 style="font-size: 3.5rem; margin-top: 0; margin-bottom: 20px; font-weight: 800; background: -webkit-linear-gradient(135deg, #fff, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 0 30px rgba(245, 158, 11, 0.3);">
            Logros del Comandante
        </h2>
        <div style="background: rgba(16, 26, 43, 0.8); border: 1px solid rgba(255,255,255,0.05); padding: 30px 40px; border-radius: 20px; max-width: 750px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
            <p style="font-size: 1.15rem; color: #cbd5e1; line-height: 1.8; margin: 0;">
                Tu colección personal de honores espaciales y descubrimientos validados. Gana puntos de experiencia (XP) para subir de nivel completando lecciones y asistiendo a misiones en vivo.
            </p>
        </div>
    </section>

    @if(session('success'))
        <div style="background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.3); color: #fbbf24; padding: 15px; border-radius: 12px; margin-bottom: 30px; text-align: center; font-weight: bold; box-shadow: 0 0 20px rgba(245, 158, 11, 0.1);">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; padding: 15px; border-radius: 12px; margin-bottom: 30px; text-align: center; font-weight: bold; box-shadow: 0 0 20px rgba(239, 68, 68, 0.1);">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Barra de Progreso Dinámica -->
    <section class="progreso-global" style="background: linear-gradient(135deg, rgba(255,255,255,0.02), {{ $user->user_level_color }}15); border-radius: 24px; padding: 2rem; border: 1px solid {{ $user->user_level_color }}40; margin-bottom: 4rem; display: flex; align-items: center; gap: 2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
        
        <div style="text-align: center; min-width: 150px;">
            <div style="font-size: 3rem; font-weight: bold; color: {{ $user->user_level_color }}; text-shadow: 0 0 15px {{ $user->user_level_color }}80;">LVL {{ $user->user_level_number }}</div>
            <div style="font-size: 0.9rem; color: white; text-transform: uppercase; letter-spacing: 1px; margin-top: 5px;">{{ $user->user_level }}</div>
        </div>

        <div class="bar-container" style="flex-grow: 1; height: 12px; background: rgba(0,0,0,0.5); border-radius: 10px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1);">
            <div class="bar-fill" style="width: {{ $user->xp_progress }}%; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,0.1), {{ $user->user_level_color }}); box-shadow: 0 0 15px {{ $user->user_level_color }}; transition: width 1s ease-in-out;"></div>
        </div>
        
        <div class="stats-text" style="text-align: right; min-width: 100px;">
            <span style="color: {{ $user->user_level_color }}; font-weight: bold; font-size: 1.2rem;">{{ $user->xp }} / {{ $user->user_level_number === 'MAX' ? '∞' : $user->next_level_xp }}</span> 
            <span style="font-size: 0.8rem; color: rgba(255,255,255,0.5); display: block;">Puntos XP</span>
        </div>
    </section>

    <!-- Grid Dinámico de Recompensas -->
    <div class="bento-grid trofeos-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2.5rem;">
        
        @foreach($rewards as $reward)
            @php
                $isUnlocked = $unlockedRewards[$reward->slug] ?? false;
                $isEquipped = $user->current_title === $reward->slug;
                
                // Extraer el color base para aplicarlo a gradientes y sombras
                $hexColor = $reward->color;
                $rgbColor = sscanf($hexColor, "#%02x%02x%02x");
                $rgbaColor = "rgba({$rgbColor[0]}, {$rgbColor[1]}, {$rgbColor[2]}, ";
            @endphp
            
            <div class="bento-card trofeo-card {{ $isUnlocked ? '' : 'locked' }}" 
                 style="background: {{ $isUnlocked ? 'linear-gradient(135deg, '.$rgbaColor.'0.1), rgba(16, 26, 43, 0.8))' : 'rgba(16, 26, 43, 0.5)' }}; 
                        border: 1px solid {{ $isEquipped ? $hexColor : 'rgba(255,255,255,0.1)' }}; 
                        border-radius: 24px; padding: 2.5rem 2rem; text-align: center;
                        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
                        {{ $isUnlocked ? '' : 'filter: grayscale(1) opacity(0.6);' }} 
                        {{ $isEquipped ? 'box-shadow: 0 0 25px '.$rgbaColor.'0.4); transform: scale(1.02);' : '' }}">
                
                <div class="icon-container" style="color: {{ $isUnlocked ? $reward->text_color : '#94a3b8' }}; width: 4.5rem; height: 4.5rem; margin: 0 auto 1.5rem; display: block; filter: drop-shadow(0 0 15px {{ $isUnlocked ? $rgbaColor.'0.5)' : 'transparent' }});">
                    {!! $reward->icon !!}
                </div>
                
                <h3 style="font-size: 1.4rem; color: {{ $isUnlocked ? $reward->text_color : '#94a3b8' }}; margin-top: 0; font-weight: 800; letter-spacing: 0.5px;">{{ $reward->name }}</h3>
                <p style="font-size: 0.95rem; color: {{ $isUnlocked ? '#cbd5e1' : '#64748b' }}; margin-bottom: 25px; line-height: 1.6; min-height: 45px;">{{ $reward->description }}</p>
                
                @if($isUnlocked)
                    @if($isEquipped)
                        <div style="margin-top: auto; padding: 8px 15px; background: {{ $rgbaColor }}0.2); border: 1px solid {{ $hexColor }}; border-radius: 20px; color: {{ $reward->text_color }}; font-size: 0.85rem; text-transform: uppercase; font-weight: bold; display: inline-block;">
                            ✔ Título Equipado
                        </div>
                    @else
                        <form action="{{ route('recompensas.equip', $reward->slug) }}" method="POST" style="margin-top: auto;">
                            @csrf
                            <button type="submit" class="equip-btn" data-color="{{ $rgbaColor }}" style="padding: 10px 25px; font-size: 0.9rem; font-weight: bold; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); color: white; border-radius: 20px; cursor: pointer; transition: all 0.3s ease; width: 100%;">
                                Equipar Título
                            </button>
                        </form>
                    @endif
                @else
                    <div style="margin-top: auto; padding: 8px 15px; background: rgba(0,0,0,0.3); border: 1px dashed rgba(255,255,255,0.2); border-radius: 20px; color: #64748b; font-size: 0.8rem; text-transform: uppercase; display: inline-block; font-weight: bold; letter-spacing: 1px;">
                        🔒 Misión Bloqueada
                    </div>
                @endif
            </div>
        @endforeach

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.equip-btn');
        buttons.forEach(btn => {
            const rgba = btn.getAttribute('data-color');
            btn.addEventListener('mouseover', function() {
                this.style.background = rgba + '0.2)';
                this.style.borderColor = rgba + '0.8)';
            });
            btn.addEventListener('mouseout', function() {
                this.style.background = 'rgba(255,255,255,0.05)';
                this.style.borderColor = 'rgba(255,255,255,0.2)';
            });
        });
        
        const cards = document.querySelectorAll('.trofeo-card:not(.locked)');
        cards.forEach(card => {
            // Eliminar hover si está equipado porque ya tiene scale
            if(!card.innerHTML.includes('Título Equipado')) {
                card.addEventListener('mouseover', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                card.addEventListener('mouseout', function() {
                    this.style.transform = 'translateY(0)';
                });
            }
        });
    });
</script>

<style>
    @media (max-width: 768px) {
        .progreso-global {
            flex-direction: column;
            gap: 1.5rem;
            align-items: center;
            text-align: center;
        }
        .bar-container {
            width: 100%;
        }
        .stats-text {
            text-align: center !important;
        }
    }
</style>
@endsection
