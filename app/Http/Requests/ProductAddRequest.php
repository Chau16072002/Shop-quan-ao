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
            'product_name' => 'bail|required|unique:products|max:255|min:10',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_status' => 'required',
            'product_desc' => 'required|min:1|',
            'product_content' => 'required|min:1|',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

            
        ];
    }
    public function messages()
{
    return [
        'product_name.required' => 'Tên không được phép bỏ trống',
        'product_name.unique' => 'Tên không được phép trùng',
        'product_name.max' => 'Tên không được phép quá 255 kí tự',
        'product_name.min' => 'Tên không được phép ít hơn 10 kí tự',
        'product_price.required' => 'Giá không được phép bỏ trống',
        'category_id.required' => 'Thương hiệu không được phép bỏ trống',
        'brand_id.required' => 'Danh mục không được phép bỏ trống',
        'product_status.required' => 'Trạng thái không được phép bỏ trống',
        'product_desc.required' => 'Mô tả không được để trống',
        'product_desc.min' => 'Mô tả không được phép ít hơn 1 kí tự',
        'product_content.required' => 'Nội dung không được để trống',
        'product_content.min' => 'Nội dung không được phép ít hơn 1 kí tự',
        'product_image.required' => 'Hình ảnh không được đễ trống',
        'product_image.image' => 'Chỉ được phép thêm hình ảnh',
        'product_image.mimes' => 'File không đúng tên miền',
       
        
        
        
        
    ];
}
}
