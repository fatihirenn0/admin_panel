<?php

namespace App\Http\Requests\Video;

use App\Models\ContactPeople;
use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class VideoStoreRequest extends FormRequest
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
        $rules["title"] = ['nullable' , 'string', 'max:255'];
        $rules['video_url'] = ['nullable', 'mimes:mp4,mov,avi,mkv,webm,3gp,mpeg', 'max:20480'];
        $rules['rank'] = ['nullable', 'integer', 'min:0'];
        return $rules;
    }

    public function attributes(): array
    {
        $attributes = [];
        $attributes["title"] = "Video Adı";
        $attributes["video_url"] = "Video";
        $attributes['rank'] = 'Gösterim Sırası';
        return $attributes;
    }

}
