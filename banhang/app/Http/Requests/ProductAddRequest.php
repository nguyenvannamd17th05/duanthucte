<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name'=>'bail|required|unique:products|max:255|min:10',
            'price'=>'required',
            'cate_id'=>'required',
            'content'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique'=>'Bạn đã nhập tên trùng',
            'price.required' => 'Giá không được để trống',
            'cate_id.required' => 'Danh mục không được để trống',
            'content.required' => 'Nội dung không được để trống'
        ];
    }
}
