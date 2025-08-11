<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Announcement extends Model
{
    use HasTranslations;

    public array $translatable = ['text'];
    protected $fillable = [
        'text','rank','created_at','updated_at','deleted_at'
    ];

    protected $casts = [
        'text' => 'array',
    ];
}
