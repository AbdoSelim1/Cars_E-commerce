<?php

namespace App\Http\Requests\Dashboard\Category;

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name.en' => ['required', 'max:32', 'unique_translation:categories'],
            'name.ar' => ['required', 'max:32', 'unique_translation:categories'],
            'status' => ['required', 'integer', "in:" . implode(',', CategoryController::AVELABLE_STATUS)],
            'parent_id'=>['nullable','integer','exists:categories,parent_id'],
        ];
    }
}
