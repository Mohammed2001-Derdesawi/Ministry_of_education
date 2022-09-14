<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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

          'region'=>'required|string|min:4',
           'street'=>'required|string|min:4',
           'specializations'=>'required|array',
           'specializations.*'=>'nullable|integer'
        ];
    }

    public function messages()
    {
        return [
            'region.required'=>' حقل المنطقة مطلوب',
            'street.required'=>'حقل الشارع مطلوب',
            'specializations.required'=>'الرجاء إدخال عدد المعلمين حسب التخصصات أعلاه',
            'specializations.array'=>'الرجاء التأكد من صحة البيانات',
            'specializations.*'=>'الرجاء التأكد من صحة البيانات',
        ];
    }
}
