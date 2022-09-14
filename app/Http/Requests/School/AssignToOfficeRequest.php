<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class AssignToOfficeRequest extends FormRequest
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
            'direction'=>'required|integer|exists:directions,id'
        ];
    }

    public function messages()
    {
        return [
            'direction.required'=>'الرجاء اختيار مكتب تعليم',
            'direction.integer'=>'الرجاء اختيار مكتب تعليم صحيح',
            'direction.exists'=>' الرجاء اختيار مكتب تعليم موجود',

        ];
    }
}
