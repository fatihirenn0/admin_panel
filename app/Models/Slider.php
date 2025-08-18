<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use SoftDeletes, HasTranslations;

    protected $fillable = [
        'file_url',
        'title',
        'text',
        'sub_text',
        'link',
        'link_text',
        'rank',
    ];

    public $translatable = ['file_url','title','text','sub_text','link','link_text'];

    protected $casts = ['file_url' => 'array','title' => 'array','sub_text' => 'array','text' => 'array','link' => 'array','link_text' => 'array'];
}
