<?php

namespace App\Http\Requests\Api;

class ImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'type' => 'required|string|in:avatar',
        ];

        if ($this->type == 'avatar') {
            $rules['image'] = 'required|mimes:png,jpg,jpeg,gif|dimensions:min_width=200,min_height=200';
        } else {
            $rules['image'] = 'required|mimes:png,jpg,jpeg,gif';
        }

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'type'  => '图片类型',
            'image' => '图片',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.dimensions' => '图片的清晰度不够，宽和高需要 200px 以上',
        ];
    }
}
