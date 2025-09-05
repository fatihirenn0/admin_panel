<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactPeople extends Model
{
    use SoftDeletes;

    protected $table='contact_people';

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'image',
        'address',
        'rank',
    ];

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
