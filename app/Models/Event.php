<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'event_date',
        'location',
        'image_path',
        'status',
        'xp_reward',
    ];

    protected $casts = [
        'event_date' => 'datetime',
    ];

    /**
     * Get the users that are attending the event.
     */
    public function attendees()
    {
        return $this->belongsToMany(User::class, 'event_user')->withTimestamps();
    }
}
