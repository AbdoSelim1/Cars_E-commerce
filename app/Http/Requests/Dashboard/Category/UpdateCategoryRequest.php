<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\CategoryController;

class UpdateCategoryRequest extends FormRequest
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
            'name.en' => ['required', 'max:32', "unique_translation:categories,name,{$this->id},id"],
            'name.ar' => ['required', 'max:32', "unique_translation:categories,name,{$this->id},id"],
            'status' => ['required', 'integer', "in:" . implode(',', CategoryController::AVELABLE_STATUS)],
            'parent_id'=>['nullable','integer','exists:categories,id'],
        ];
    }
}
