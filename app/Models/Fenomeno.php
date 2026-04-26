<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fenomeno extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
