<?php

namespace App\Http\Requests\Dashboard\Region;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
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
            'name.en' => ['required', 'max:32', 'unique_translation:regions'],
            'name.ar' => ['required', 'max:32', 'unique_translation:regions'],
            'status' => ['required', 'integer', 'in:1,0'],
            'latitude'=>['nullable','numeric'],
            'longitude'=>['nullable','numeric'],
            'notes'=>['nullable','string'],
            'city_id'=>['required','integer','exists:cities,id']
        ];
    }
}
