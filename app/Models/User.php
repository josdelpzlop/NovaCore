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
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>'
        ],
        'cazador_estelar' => [
            'name' => 'Cazador Estelar',
            'color' => '#06b6d4',
            'text_color' => '#67e8f9',
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>'
        ],
        'rey_anillos' => [
            'name' => 'Rey de los Anillos',
            'color' => '#fb923c',
            'text_color' => '#fdba74',
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>'
        ],
        'vuelo_inaugural' => [
            'name' => 'Vuelo Inaugural',
            'color' => '#ef4444',
            'text_color' => '#fca5a5',
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>'
        ],
        'leyenda_nova' => [
            'name' => 'Leyenda Nova',
            'color' => '#fbbf24',
            'text_color' => '#fde68a',
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>'
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
