<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\formUserAdd;
use App\Http\Requests\formUserEdit;
use Validator;
class AccountController extends Controller
{
    /** 
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['users']=user::orderBy('id','desc')->paginate(5);
       return view('backend.account.index',$data);
    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
       return view('backend.account.create');
    }

    /** 
    post account.store =>url acount/store
    */
    public function store(formUserAdd $request)
    {
        $password=bcrypt($request->password);
    	$request->merge(['password'=>$password]);
        $image='user.png';
  
        if($request->img)
        {
            $image=time().$request->img->getClientOriginalName();
        	$request->img->move('backend/avatar',$image);

        }
        $request->merge(['image' => $image]);
         // dd($request->all());
        user::create($request->all());
    	return redirect()->route('account.index')->with('success','Thêm mới tài khoản thành công!');
    }

    /** 
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['user']=user::find($id);
       return view('backend.account.edit',$data);
    }

     /** 
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'bail|required',
            'usename'=>'bail|required|min:6|unique:users,usename,'.$id,
            'email'=>'bail|required|email|unique:users,email,'.$id,
            'confirm_password'=>'bail|same:password',
        ],[
            'name.required'=>'Bạn chưa nhập tên tài khoản !',
            'email.required'=>'Bạn chưa nhập email !', 
            'email.email'=>'Bạn phải nhập đúng chuẩn email !', 
            'email.unique'=>'Email này đã được sử dụng !', 
            'usename.required'=>'Bạn chưa nhập tài khoản !', 
            'usename.min'=>'Tài khoản phải có ít nhất 6 kí tự !', 
            'usename.unique'=>'Tài khoản này đã được sử dụng !', 
            'confirm_password.same'=>'Mật khẩu nhập lại không chính sác !',
        ]);
        if($request->img)
        {
            $image=time().$request->img->getClientOriginalName();
            $request->img->move('backend/avatar',$image);
            $request->merge(['image' => $image]);
        }
        
        if($request->password)
        {
             $this->validate($request,[
                'password'=>'min:6',
             ],[
                'password.min'=>'Mật khẩu phải chứa it nhất 6 kí tự !']);
            $request->merge(['password'=>bcrypt($request->password)]);
        }else{
            $request->offsetUnset('password');
        }
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $request->offsetUnset('img');
        $request->offsetUnset('confirm_password');
        // dd($request->only('name','email','image','password'));
        user::where('id',$id)->update($request->only('name','email','image','password'));
        return redirect()->route('account.index')->with('success','Sửa tài khoản thành công!');
    }

    /** 
    get account.show =>url acount/1
    */
    public function show($id)
    {

    }

    /** 
    delete account.show =>url acount/1
    */
    public function destroy($id)
    {
        user::find($id)->delete();
        return redirect()->route('account.index')->with('success','Xóa tài khoản thành công!');
    }

    public function checkEmail(Request $request)
    {
        $validator=Validator::make($request->all(),[
        	'email'=>'bail|required|email|unique:users,email',
        ],[
            'email.required'=>'Bạn chưa nhập email !',
            'email.email'=>'Email nhập chưa đúng dạng !',
            'email.unique'=>'Email này đã được sử dụng !',
        ]);
        if($validator->passes()){
        	return json_encode(['success'=>'Check category name success.',
                                'status'=>true,]);
            
        }
        	return json_encode(['error'=>$validator->errors()->all(),
                                 'status'=>false,]);
    }
    public function checkName(Request $request)
    {
        $validator=Validator::make($request->all(),[
        	'usename'=>'bail|required|min:6|unique:users,usename',
        ],[
            'usename.required'=>'Bạn chưa nhập tài khoản !',
            'usename.min'=>'Tài khoản phải có it nhất 6 kí tự !',
            'usename.unique'=>'Tài khoản này đã được sử dụng !',
        ]);
        if($validator->passes()){
        	return json_encode(['success'=>'Check category name success.',
                                'status'=>true,]);
            
        }
        	return json_encode(['error'=>$validator->errors()->all(),
                                 'status'=>false,]);
    }
}
