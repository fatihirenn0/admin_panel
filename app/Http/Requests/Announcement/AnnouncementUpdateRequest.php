<?php

namespace App\Http\Requests\Announcement;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class AnnouncementUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        $locales = Locale::all();

        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["text.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:1000'];
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

            $attributes["name.$code"] = "İçerik ($lang)";
        }

        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }
}
