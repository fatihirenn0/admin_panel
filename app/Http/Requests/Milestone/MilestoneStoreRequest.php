<?php

namespace App\Http\Requests\Milestone;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class MilestoneStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        // Dil ayarlarını config'den veya helper'dan çekebilirsiniz
        $locales = Locale::all();

        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["description.$locale->locale"] = ['nullable', 'string'];
            $rules["date.$locale->locale"] = ['nullable', 'date'];
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

            $attributes["name.$code"] = "Tarihçe Adı ($lang)";
            $attributes["description.$code"] = "Tarihçe Açıklaması ($lang)";
            $attributes["date.$code"] = "Olay Tarihi($lang)";
            $attributes["image.$code"] = "Resmi ($lang)";
        }

        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }

}
