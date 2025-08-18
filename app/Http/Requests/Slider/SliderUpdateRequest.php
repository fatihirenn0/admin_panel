<?php

namespace App\Http\Requests\Slider;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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

        $locales = Locale::all();

        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["title.$locale->locale"] = ['nullable', 'string', 'max:255'];
            $rules["text.$locale->locale"] = ['nullable', 'string', 'max:255'];
            $rules["sub_text.$locale->locale"] = ['nullable', 'string', 'max:255'];
            $rules["link.$locale->locale"] = ['nullable', 'string', 'max:255'];
            $rules["link_text.$locale->locale"] = ['nullable', 'string', 'max:255'];
            $rules["file_url.$locale->locale"] = [$first ? 'required' : 'nullable', 'mimes:jpg,jpeg,png,webp,svg,mp4,mov,avi,mkv,webm','max:10240'];
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

            $attributes["title.$code"] = "Slider Başlık ($lang)";
            $attributes["text.$code"] = "Slider Metin ($lang)";
            $attributes["sub_text.$code"] = "Slider Alt Metin ($lang)";
            $attributes["link.$code"] = "Slider Buton Başlık ($lang)";
            $attributes["link_text.$code"] = "Slider Buton Link ($lang)";
            $attributes["file_url.$code"] = "Görsel/Video ($lang)";
        }
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }

}
