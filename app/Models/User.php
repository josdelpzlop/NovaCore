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
        'avatar',
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

    /**
     * Get the current equipped title (reward).
     */
    public function currentReward()
    {
        return $this->belongsTo(Reward::class, 'current_title', 'slug');
    }

    public static function getRankInfo($xp)
    {
        $rank = \App\Models\Rank::where('min_xp', '<=', $xp)
                    ->orderBy('min_xp', 'desc')
                    ->first();
                    
        if (!$rank) {
            return ['number' => 0, 'title' => 'Recluta', 'color' => '#9ca3af', 'next' => 100, 'prev' => 0];
        }

        $nextRank = \App\Models\Rank::where('min_xp', '>', $xp)
                        ->orderBy('min_xp', 'asc')
                        ->first();

        return [
            'number' => $rank->number,
            'title' => $rank->title,
            'color' => $rank->color,
            'next' => $nextRank ? $nextRank->min_xp : $rank->min_xp,
            'prev' => $rank->min_xp
        ];
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
        if ($info['number'] === 'MAX') return 100;
        
        $range = $info['next'] - $info['prev'];
        if ($range <= 0) return 100;
        
        $progress = $xp - $info['prev'];
        return min(100, max(0, round(($progress / $range) * 100)));
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
