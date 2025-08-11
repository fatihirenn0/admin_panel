<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    public function save($locale,$request,$slug,$table,$key = 'image',$oldImage = null)
    {
        $old = ltrim(Str::after((string)$oldImage, 'storage/'), '/');

        $inputKey = $locale ? "{$key}.{$locale}" : $key;

        if ($request->hasFile($inputKey)) {
            if ($old && Storage::disk('public2')->exists($old)) {
                Storage::disk('public2')->delete($old);
            }

            $fileName = $slug . '.webp';
            return $request->file($inputKey)->storeAs($table, $fileName, 'public2');
        } else {
            $deleted = collect($request->input('deleted_images', []))
                ->map(fn ($p) => ltrim(Str::after((string)$p, 'storage/'), '/'));

            if ($old && $deleted->contains($old)) {
                if (Storage::disk('public2')->exists($old)) {
                    Storage::disk('public2')->delete($old);
                }
                return null;
            } else {
                return $oldImage;
            }
        }
    }
}
