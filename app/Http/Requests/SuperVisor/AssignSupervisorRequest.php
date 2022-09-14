<?php

namespace App\Http\Requests\SuperVisor;

use Illuminate\Foundation\Http\FormRequest;

class AssignSupervisorRequest extends FormRequest
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
            'direction'=>'required|integer|exists:directions,id',
             'supervisors'=>'required|array',
             'supervisors.*'=>'integer'
        ];
    }

    public function messages()
    {
        return [
            'direction.required'=>'الرجاء اختيار مكتب تعليم',
            'direction.integer'=>'الرجاء اختيار مكتب تعليم',
            'direction.exists'=>'مكتب التعليم غير موجود',
            'supervisors.required'=>'الرجاء اختيار  مشرف',
            'supervisors.*'=>'الرجاء التأكد من إدخال قيم صحيحة للمشرفين',
            'supervisors.array'=>'الرجاء التأكد من إدخال قيم صحيحة للمشرفين',
        ];
    }
}
