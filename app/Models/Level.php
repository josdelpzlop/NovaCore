<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'badge', 'description', 'image', 'url'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
