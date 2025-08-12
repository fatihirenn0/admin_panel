<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['question', 'answer'];

    protected $fillable = [
        'question',
        'answer',
        'rank',
    ];

    protected $casts = [
        'question' => 'array',
        'answer' => 'array',
    ];
}
