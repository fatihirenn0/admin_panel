<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SlugService
{
    public function create($table,$request,$locale,$exceptId = null)
    {
        $baseSlug = Str::slug($request->name[$locale]);
        if (empty($baseSlug))
            $baseSlug = Str::slug(Str::random(10));
        $slug = $baseSlug;
        $counter = 1;

        // Aynı slug varsa benzersiz hale getir
        while (DB::table($table)->where("slug->{$locale}", $slug)
            ->when(!is_null($exceptId), function ($query) use ($exceptId) {
                $query->where("id", "!=", $exceptId);
            })
            ->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
