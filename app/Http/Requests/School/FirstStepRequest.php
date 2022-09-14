<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class FirstStepRequest extends FormRequest
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
            'director'=>'string|min:4|max:40|required',
            'name'=>'string|min:4|max:40|required',
            'gender'=>'string|min:4|max:4|required',
            'ministerial_number'=>'required|string',
            'direction'=>'required|integer|min:1|max:8',
            'school_rating'=>'required|max:4|min:1'
        ];
    }

    public function messages()
    {
        return [
            'ministerial_number.required'=>'الرقم الوزاري مطلوب',
            'ministerial_number.string'=>'الرقم الوزاري يجب أن يكون نص',

            'director.required'=>'اسم المدير مطلوب',
            'director.string'=>'اسم المدير يجب أن يكون نصا',
            'director.min'=>'اسم المدير يجب ان يكون ما بين 4 أحرف و 40 حرفا',
            'director.max'=>'اسم المدير يجب ان يكون ما بين 4 أحرف و 40 حرفا',

            'name.required'=>'اسم المدرسة مطلوب',
            'name.string'=>'اسم المدرسة يجب أن يكون نص',
            'name.min'=>'اسم المدرسة يجب أن يكون ما بين 4 و 40 حرفا',
            'name.max'=>'اسم المدرسة يجب أن يكون ما بين 4 و 40 حرفا',


            'gender.required'=>'حقل القطاع مطلوب',
            'gender.string'=>'حقل القطاع يجب أن يكون نص',
            'gender.min'=>'حقل القطاع يجب أن يكون عبارة عن 4-6 أحرف',
            'gender.max'=>'حقل القطاع يجب أن يكون عبارة عن 4-6 أحرف',

            'direction.required'=>'الرجاء اختيار مكتب تعليم',
            'direction.integer'=>'   الرجاء اختيار مكتب تعليم صحيح',
            'direction.min'=>' مكتب التعليم يجب أن يكون ما بين 1 و 8 ',
            'direction.max'=>' مكتب التعليم يجب أن يكون ما بين 1 و 8 ',

        'school_rating.require'=>'الرجاء اختيار نوع المدرسة',
        'school_rating.max'=>'  نوع المدرسة يجب أن يكون ما بين 1 و 4 ',
        'school_rating.min'=>' مكتب التعليم يجب أن يكون ما بين 1 و 4 ',

        ];
    }
}
