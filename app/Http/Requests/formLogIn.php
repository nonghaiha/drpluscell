<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formLogIn extends FormRequest
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
            'usename'=>'bail|required|min:6|alpha_num',
            'password'=>'bail|required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'usename.required'=>'Bạn chưa nhập tên tài khoản !', 
            'usename.alpha_num'=>'Tên tài khoản không được chứa ký tự đặc biệt !', 
            'usename.min'=>'Tên tài khoản phải có it nhất 6 kí tự !', 
            'password.required'=>'Bạn chưa nhập mật khẩu !', 
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự !', 
        ];
    }
}
