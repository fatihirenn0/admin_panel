<?php

namespace App\Http\Requests\Photo;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class PhotoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        $locales = Locale::all();

        $rules['photo_category_id'] = ['nullable','exists:photo_categories,id'];
        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["image.$locale->locale"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
        }

        $rules['rank'] = ['nullable', 'integer', 'min:0'];

        return $rules;
    }

    public function attributes(): array
    {
        $locales = Locale::all();

        $attributes = [];
        foreach ($locales as $locale) {
            $code = $locale->locale;
            $lang = $locale->language;

            $attributes["name.$code"] = "Fotoğraf Adı ($lang)";
            $attributes["image.$code"] = "Kapak Resmi ($lang)";
        }

        $attributes['photo_category_id'] = 'Fotoğraf Kategori';
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }
}
