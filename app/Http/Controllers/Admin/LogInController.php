<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\formLogin;
use Auth;

class LogInController extends Controller
{
    public function getLogIn()
    {
        return view('backend.login.login');
    }
    public function postLogIn(formLogin $request)
    {
        $arr=['usename'=>$request->usename,'password'=>$request->password];
        if(Auth::attempt($arr,$request->has('remember')))
        {
            return redirect()->route('admin.index');
        }
        else{
            return back()->with('error','Tài khoản hoặc mật khẩu không chính sác !');
        }
        
    }
}
