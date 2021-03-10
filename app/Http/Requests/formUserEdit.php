<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formUserAdd extends FormRequest
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
            'name'=>'bail|required',
            'usename'=>'bail|required|min:6|unique:users,usename',
            'email'=>'bail|required|email|unique:users,email,'.$id,
            'password'=>'bail|required|min:6',
            'confirm_password'=>'bail|required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Bạn chưa nhập tên tài khoản !',
            'email.required'=>'Bạn chưa nhập email !', 
            'email.email'=>'Bạn phải nhập đúng chuẩn email !', 
            'email.unique'=>'Email này đã được sử dụng !', 
            'usename.required'=>'Bạn chưa nhập tài khoản !', 
            'usename.min'=>'Tài khoản phải có ít nhất 6 kí tự !', 
            'usename.unique'=>'Tài khoản này đã được sử dụng !',
            'password.required'=>'Bạn chưa nhập mật khẩu !', 
            'password.min'=>'Password phải có ít nhất 6 kí tự !', 
            'confirm_password.required'=>'Bạn chưa nhập lại mật khẩu !',
            'confirm_password.same'=>'Mật khẩu nhập lại không chính sác !',
        ];
    }
}
