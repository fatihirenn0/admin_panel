<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Video extends Model
{
    use HasTranslations, SoftDeletes;

    protected $fillable = [
        'title',
        'video_url',
        'rank',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
