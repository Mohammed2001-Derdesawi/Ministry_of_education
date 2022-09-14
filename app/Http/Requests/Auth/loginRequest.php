<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email'=>'required|email|string|max:255|min:8|exists:'. $type.',email',
            'type'=>'required|string',
            'password'=>'required|string|min:7|max:25',
        ];
    }

    public function messages()
    {
        return [
            'email.exists'=>'البريد الإلكتروني ليس صحيحا',
            'email.email'=>'البريد الإلكتروني ليس صحيحا',
            'type.required'=>'النوع مطلوب',
            'email.required'=>'البريد الإلكتروني مطلوب',
            'password.required'=>'كلمة المرور  مطلوب',
            'password.min'=>'كلمة المرور  يجب أن تكون ما بين 7 أحرف و 25 حرف',
            'password.max'=>'كلمة المرور  يجب أن تكون ما بين 7 أحرف و 25 حرف',
            'password.string'=>'كلمة المرور  يجب أن تكون نصا ',
            'email.email'=>'الرجاء التأكد من إدخال بريدا صحيحا',
            'email.string'=>'البريد يجب أن يكون نصا',
            'type.string'=>'النوع يجب أن يكون نصا',
            'email.min'=>' 7 حرف , 255 حرفا الرجاء إدخال بريد عدد الأحرف يكون ما بين ',
            'email.max'=>' 7 حرف , 255 حرفا الرجاء إدخال بريد عدد الأحرف يكون ما بين ',

        ];
    }
}
