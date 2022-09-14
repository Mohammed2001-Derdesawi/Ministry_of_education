<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class AssignSchoolRequest extends FormRequest
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
            'schools'=>'array|required',
            'schools.*'=>'integer',
             'directions'=>'required|integer|exists:directions,id'
        ];
    }

    public function messages()
    {
        return [
            'schools.required'=>'الرجاء اختيار مدرسة',
            'schools.*.integer'=>'الرجاء التأكد من الأختيار',
            'directions.required'=>'الرجاء اختيار مكتب تعليم',
            'directions.integer'=>'الرجاء اختيار مكتب تعليم صحيح',
            'directions.exists'=>' الرجاء اختيار مكتب تعليم موجود',

        ];
    }
}
