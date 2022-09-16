<?php

namespace App\Models;

use App\Casts\DiaryPrivacy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'date',
        'privacy',
        'content',
    ];

    protected $casts = [
        'privacy' => DiaryPrivacy::class,
    ];
}