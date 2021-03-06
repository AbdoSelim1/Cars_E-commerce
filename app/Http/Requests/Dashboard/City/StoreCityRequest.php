<?php

namespace App\Http\Requests\Dashboard\City;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ['array:en,ar'],
            'name.en' => ['required', 'max:32', 'unique_translation:cites'],
            'name.ar' => ['required', 'max:32', 'unique_translation:cites'],
            'status' => ['required', 'integer', 'in:1,0'],
        ];
    }
}
