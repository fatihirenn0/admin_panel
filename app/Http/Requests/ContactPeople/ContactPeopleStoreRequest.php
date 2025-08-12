<?php

namespace App\Http\Requests\ContactPeople;

use App\Models\ContactPeople;
use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class ContactPeopleStoreRequest extends FormRequest
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
        $rules["name"] = ['required' , 'string', 'max:255'];
        $rules["telephone"] = ['nullable', 'string'];
        $rules["email"] = ['nullable', 'string'];
        $rules["image"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
        $rules["address"] = ['nullable', 'string'];
        $rules['rank'] = ['nullable', 'integer', 'min:0'];

        return $rules;
    }

    public function attributes(): array
    {
        $attributes = [];
        $attributes["name"] = "İletişim Kişi Adı";
        $attributes["telephone"] = "Telefon";
        $attributes["email"] = "E-Posta Adresi";
        $attributes["image"] = "Kapak Resmi";
        $attributes["address"] = "Adres";
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }

}
