<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ProjectCategory extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','image','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'image',
        'rank',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
        'meta_keywords' => 'array',
        'meta_description' => 'array',
        'image' => 'array',
    ];

    public function projects()
    {
        return $this->hasManyThrough(
            Project::class,             // hedef model
            ProjectProjectCategory::class, // ara model
            'project_category_id',      // ara modeldeki foreign key (ProjectCategory ilişkisi)
            'id',                    // hedef modeldeki primary key
            'id',                    // ProjectCategory tablosundaki local key
            'project_id'                // ara modeldeki hedef model foreign key
        );
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug->'.session('locale','tr');
    }
}
