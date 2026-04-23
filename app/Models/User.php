<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'xp',
    ];

    public static $achievementData = [
        'pionero_lunar' => [
            'name' => 'Pionero Lunar',
            'color' => '#94a3b8',
            'text_color' => '#cbd5e1',
            'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>'
        ],
        'cazador_estelar' => [
            'name' => 'Cazador Estelar',
            'color' => '#06b6d4',
            'text_color' => '#67e8f9',
            'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>'
        ],
        'rey_anillos' => [
            'name' => 'Rey de los Anillos',
            'color' => '#f59e0b',
            'text_color' => '#fbbf24',
            'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6"></circle><path d="M22 12c0-2-8-5-20-3"></path><path d="M22 12c0 2-8 5-20 3"></path></svg>'
        ],
        'vuelo_inaugural' => [
            'name' => 'Vuelo Inaugural',
            'color' => '#ef4444',
            'text_color' => '#fca5a5',
            'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>'
        ],
        'leyenda_nova' => [
            'name' => 'Leyenda Nova',
            'color' => '#fbbf24',
            'text_color' => '#fde68a',
            'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>'
        ],
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if the user is an administrator.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Get the lessons that the user has completed.
     */
    public function completedLessons()
    {
        return $this->belongsToMany(Lesson::class)->withTimestamps();
    }

    /**
     * Get the events the user is attending.
     */
    public function attendedEvents()
    {
        return $this->belongsToMany(Event::class, 'event_user')->withTimestamps();
    }

    public static function getRankInfo($xp)
    {
        if ($xp >= 2000) {
            return ['number' => 'MAX', 'title' => 'Ente Espacial', 'color' => '#a855f7', 'next' => 2000, 'prev' => 1000]; // Morado
        } elseif ($xp >= 1000) {
            return ['number' => 4, 'title' => 'Ayudante Estelar', 'color' => '#eab308', 'next' => 2000, 'prev' => 600]; // Amarillo
        } elseif ($xp >= 600) {
            return ['number' => 3, 'title' => 'Astronauta Curioso', 'color' => '#ef4444', 'next' => 1000, 'prev' => 300]; // Rojo
        } elseif ($xp >= 300) {
            return ['number' => 2, 'title' => 'Misionero Astral', 'color' => '#f97316', 'next' => 600, 'prev' => 100]; // Naranja
        } elseif ($xp >= 100) {
            return ['number' => 1, 'title' => 'Explorador Novato', 'color' => '#78350f', 'next' => 300, 'prev' => 0]; // Marron
        } else {
            return ['number' => 0, 'title' => 'Desconocido del Vacio', 'color' => '#9ca3af', 'next' => 100, 'prev' => 0]; // Gris
        }
    }

    public function getUserLevelAttribute()
    {
        return self::getRankInfo($this->xp ?? 0)['title'];
    }

    public function getUserLevelNumberAttribute()
    {
        return self::getRankInfo($this->xp ?? 0)['number'];
    }

    public function getUserLevelColorAttribute()
    {
        return self::getRankInfo($this->xp ?? 0)['color'];
    }

    public function getNextLevelXpAttribute()
    {
        return self::getRankInfo($this->xp ?? 0)['next'];
    }

    public function getXpProgressAttribute()
    {
        $xp = $this->xp ?? 0;
        $info = self::getRankInfo($xp);
        if ($info['number'] === 'MAX') return 100; // Nivel máximo
        
        $currentRange = $info['next'] - $info['prev'];
        $xpInCurrentLevel = $xp - $info['prev'];
        
        return min(100, max(0, round(($xpInCurrentLevel / $currentRange) * 100)));
    }

    public function addXP($amount)
    {
        $this->xp = ($this->xp ?? 0) + $amount;
        $this->save();
    }

    public function hasCompletedAnyLesson()
    {
        return $this->completedLessons()->exists();
    }

    public function attendedEventsCount()
    {
        return $this->attendedEvents()->count();
    }

    public function completedLessonsCount()
    {
        return $this->completedLessons()->count();
    }
}
