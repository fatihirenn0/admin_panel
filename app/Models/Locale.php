<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $fillable = [
        'language',
        'image',
        'rank',
        'default',
        'active',
    ];
}
