<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StaticFile extends Model
{
    use HasTranslations;

    public array $translatable = ['alt'];
}
