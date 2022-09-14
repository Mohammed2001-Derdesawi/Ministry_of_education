<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class ThirdRequest extends FormRequest
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
            'mentors'=>'required||integer',
            'activity_pioneers'=>'required|integer',
            'admins'=>'required|min:1|integer',
            'exam_preparers'=>'required|integer',
            'computer_laboratories'=>'required|integer',
        ];
    }

    public function messages()
    {
        return [
           'mentors.required'=>'عدد الموجهين مطلوب',
            'activity_pioneers.required'=>'عدد  رواد النشطاء مطلوب',
            'admins.required'=>'عدد الإداريين مطلوب',
            'exam_preparers.required'=>'عدد محضري الإختبارات مطلوب',
            'computer_laboratories.required'=>'عدد محضري معامل الحاسب مطلوب',

            'mentors.integer'=>'عدد الموجهين يجب ان يكون رقم',
            'activity_pioneers.integer'=>'عدد  رواد النشطاء يجب أن يكون رقم',
            'admins.integer'=>'عدد الإداريين يجيب أن يكون رقم ',
            'exam_preparers.integer'=>'عدد محضري الإختبارات يجيب أن يكون رقم',
            'computer_laboratories.integer'=>'عدد محضري معامل الحاسب يجيب أن يكون رقم',


        ];
    }
}
