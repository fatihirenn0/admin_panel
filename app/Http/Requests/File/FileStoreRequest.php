<?php

namespace App\Http\Requests\File;

use App\Models\ContactPeople;
use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
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
        $rules["name"] = ['nullable' , 'string', 'max:255'];
        $rules['file_url'] = ['required', 'mimes:jpg,jpeg,png,webp,svg,pdf,doc,docx,xls,xlsx', 'max:5120'];

        return $rules;
    }

    public function attributes(): array
    {
        $attributes = [];
        $attributes["name"] = "Dosya Adı";
        $attributes["file_url"] = "Dosya Resmi";

        return $attributes;
    }

}
