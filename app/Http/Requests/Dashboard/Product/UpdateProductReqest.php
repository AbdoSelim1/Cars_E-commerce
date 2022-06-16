<?php

namespace App\Http\Requests\Dashboard\product;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Dashboard\Product\ProductController;

class UpdateProductReqest extends FormRequest
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
            'name'=>['required','max:50','string'],
            'price'=>['required','numeric','min:1'],
            'quantity'=>['required','integer','min:1'],
            'image'=>['nullable','max:1000'],
            'description'=>['required','min:50' ,'max:2000'],
            'status'=>['required','integer',"in:". implode(',',ProductController::AVELABLE_STATUS)],
            'seller_id'=>['required','integer','exists:sellers,id'],
            'model_id'=>['required','integer','exists:models,id'],
            'categorey_id'=>['required','integer','exists:categories,id'],
            'id'=>['required','integer','exists:products']
        ];
    }
}
