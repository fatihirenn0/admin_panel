<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasTranslations,SoftDeletes;

    public $translatable = ['job','description','education','work_experience','image','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'job',
        'email',
        'telephone',
        'image',
        'description',
        'education',
        'work_experience',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'tiktok',
        'youtube',
        'github',
        'rank',
        'meta_description',
        'meta_keywords',
    ];
    protected $casts = [
        'job' => 'array',
        'description' => 'array',
        'education' => 'array',
        'work_experience' => 'array',
        'image' => 'array',
        'meta_description' => 'array',
        'meta_keywords' => 'array'
    ];

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->hasManyThrough(
            TeamCategory::class,      // hedef model
            TeamTeamCategory::class,  // ara model (pivot gibi davranır)
            'team_id',            // ara modeldeki foreign key
            'id',                 // hedef modeldeki primary key
            'id',                 // team tablosundaki local key
            'team_category_id'         // ara modeldeki hedef model foreign key
        );
    }
}
