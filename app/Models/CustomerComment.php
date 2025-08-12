<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class CustomerComment extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','comment','image','job'];

    protected $fillable = [
        'name',
        'comment',
        'image',
        'job',
        'rank',
    ];

    protected $casts = [
        'name' => 'array',
        'comment' => 'array',
        'job' => 'array',
        'image' => 'array',
    ];
}
