<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
        $type=$this->type;
        switch($type)
        {

            case 'office':
                $type='offices';
                break;
            case 'administration':
                $type='administrations';
                break;
                default :
                $type='directors';
        }
        return [
            'type'=>'required|string',
            'email'=>'required|email|string|max:255|min:8|unique:'.$type.',email',
            'direction'=>'required_if:type,office',
            'password'=>'required|string|min:7|max:25|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'type.required'=>'النوع مطلوب',
            'email.required'=>'البريد الإلكتروني مطلوب',
            'password.required'=>'كلمة المرور  مطلوبة',
            'password.min'=>'كلمة المرور  يجب أن تكون ما بين 7 أحرف و 25 حرف',
            'password.max'=>'كلمة المرور  يجب أن تكون ما بين 7 أحرف و 25 حرف',
            'password.string'=>'كلمة المرور  يجب أن تكون نصا ',
            'email.email'=>'الرجاء التأكد من إدخال بريدا صحيحا',
            'email.unique'=>'البريد الإلكتورني موجود',
            'email.string'=>'البريد يجب أن يكون نصا',
            'type.string'=>'النوع يجب أن يكون نصا',
            'email.min'=>' 7 حرف , 255 حرفا الرجاء إدخال بريد عدد الأحرف يكون ما بين ',
            'email.max'=>' 7 حرف , 255 حرفا الرجاء إدخال بريد عدد الأحرف يكون ما بين ',
            'password.confirmed'=>'تأكيد كلمة المرور غير متطابقة',

        ];

    }
}
