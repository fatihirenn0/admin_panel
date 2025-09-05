<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class TeamCategory extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'rank',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
        'meta_keywords' => 'array',
        'meta_description' => 'array',
    ];

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug->'.session('locale','tr');
    }

    public function teams()
    {
        return $this->hasManyThrough(
            Team::class,             // hedef model
            TeamTeamCategory::class, // ara model
            'team_category_id',      // ara modeldeki foreign key (BlogCategory ilişkisi)
            'id',                    // hedef modeldeki primary key
            'id',                    // BlogCategory tablosundaki local key
            'team_id'                // ara modeldeki hedef model foreign key
        );
    }
}
