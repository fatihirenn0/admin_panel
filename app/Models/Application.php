<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Application extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'job',
        'email',
        'experience',
        'telephone',
        'file',
        'message',
        'gender',
        'department',
        'birthdate',
        'type',
    ];

}
