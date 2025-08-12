<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPeople extends Model
{
    protected $table='contact_people';
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'image',
        'address',
        'rank',
    ];
}
