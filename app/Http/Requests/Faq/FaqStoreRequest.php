<?php

namespace App\Http\Requests\Faq;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class FaqStoreRequest extends FormRequest
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
            $rules["question.$locale->locale"] = [($first ? 'required' : 'nullable' ), 'string',];
            $rules["answer.$locale->locale"] = [($first ? 'required' : 'nullable'), 'string'];
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
