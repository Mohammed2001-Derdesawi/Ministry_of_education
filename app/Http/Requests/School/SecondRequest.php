<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class SecondRequest extends FormRequest
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
            'level'=>'required|string|min:3',
            'building'=>'required|string|min:4',
            'students'=>'required|integer',
            'teachers'=>'required|integer',
            'agents'=>'required|integer',
            'time'=>'required|string'


        ];
    }

    public function messages()
    {
        return [
            'level.required'=>'حقل المرحلة مطلوب',
            'building.required'=>'حقل نوع المبنى مطلوب',
            'students.required'=>'حقل عدد الطلاب مطلوب',
            'teachers.required'=>'حقل عدد المعلمين  مطلوب',
            'agents.required'=>'حقل الوكلاء مطلوب',
            'time.required'=>'حقل فترة العمل مطلوب',
            'level.string'=>'حقل المرحلة يجب أن يكون نص',
            'building.string'=>'حقل نوع المبنى يجب أن يكون نص',
            'time.string'=>'حقل فترة العمل  يجب أن يكون نص',


            'students.integer'=>'حقل  الطلاب  يجب أن يكون رقما',
            'teachers.integer'=>'حقل  المعلمين  يجب أن يكون رقما',
            'agents.integer'=>'حقل  الوكلاء  يجب أن يكون رقما',




        ];
    }
}
