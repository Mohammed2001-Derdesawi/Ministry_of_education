<?php

namespace App\Http\Requests\SuperVisor;

use Illuminate\Foundation\Http\FormRequest;

class SupervisorCreateRequest extends FormRequest
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
            'name'=>'required|string|min:5|max:50',
            'civil'=>'required|string|min:9',
            'gender'=>'required|string|min:4|max:6',
            'specilization'=>'required|integer',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'اسم المشرف مطلوب',
            'name.string'=>'الرجاء التأكد من إدخال اسم صحيح',
            'name.min'=>'اسم المشرف يجب ان يكون ما بين 4 إلى 50 حرفا',
            'name.max'=>'اسم المشرف يجب ان يكون ما بين 4 إلى 50 حرفا',

            'gender.required'=>'حقل الجنس مطلوب',
            'gender.string'=>'حقل الجنس يجب أن يكون نص',
            'gender.min'=>'حقل القطاع يجب أن يكون عبارة عن 4-6 أحرف',
            'gender.max'=>'حقل القطاع يجب أن يكون عبارة عن 4-6 أحرف',

            'civil.required'=>'حقل السجل المدني مطلوب',
            'civil.string'=>'حقل السجل المدني يجب ان يكون نص',
            'civil.min'=>'حقل السجل المدني الحد الأدنى له 9 احرف',
            'specilization.required'=>'التخصص الإشرافي مطلوب',
            'specilization.integer'=>' التخصص الإشرافي عبارة عن رقم',


        ];
    }
}
