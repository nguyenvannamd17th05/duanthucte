<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name'=>'bail|required|unique:sliders',
            'description'=>'required',
            'img_path'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique'=>'Bạn đã nhập tên trùng',
            'description.required' => 'Mô tả không được để trống',
            
            'img_path.required' => 'Bạn chưa chọn hình ảnh'
        ];
    }
}
