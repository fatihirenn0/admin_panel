<?php

namespace App\Http\Requests\CustomerComment;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class CustomerCommentUpdateRequest extends FormRequest
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
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["comment.$locale->locale"] = ['nullable', 'string'];
            $rules["job.$locale->locale"] = ['nullable', 'string'];
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

            $attributes["name.$code"] = "Müşteri Adı ($lang)";
            $attributes["comment.$code"] = "Müşteri Yorumu ($lang)";
            $attributes["job.$code"] = "Müşteri Mesleği ($lang)";
            $attributes["image.$code"] = "Müşteri Resmi ($lang)";
        }

        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }
}
