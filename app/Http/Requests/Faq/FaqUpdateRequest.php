<?php

namespace App\Http\Requests\Faq;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class FaqUpdateRequest extends FormRequest
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
            $rules["question.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["answer.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
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

            $attributes["question.$code"] = "Soru ($lang)";
            $attributes["answer.$code"] = "Cevap ($lang)";
        }

        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }
}
