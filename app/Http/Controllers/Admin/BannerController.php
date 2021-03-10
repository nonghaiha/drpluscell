<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Validator;
class BannerController extends Controller
{
     /** 
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['banners']=Banner::orderBy('id','desc')->paginate(5);
       return view('backend.banner.index',$data);
    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
       return view('backend.banner.create');
    }

    /** 
    post account.store =>url acount/store
    */
    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'bail|required|unique:banner,name',
           'link'=>'bail|required',
        ],[
            'name.required'=>'Bạn chưa nhập tên banner !',
            'name.unique'=>'Tên banner đã tồn tại !',
            'link.unique'=>'link banner chưa có !',
        ]);
        banner::create($request->all());
        return redirect()->route('banner.index');
    }

    /** 
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['banner']=banner::find($id);
       return view('backend.banner.edit',$data);
    }

     /** 
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
           'name'=>'bail|required|unique:banner,name,'.$id,
           'link'=>'bail|required',
        ],[
            'name.required'=>'Bạn chưa nhập tên banner !',
            'name.unique'=>'Tên banner đã tồn tại !',
            'link.unique'=>'link banner chưa có !',
        ]);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        if(!$request->image)
        {
            $request->merge(['image'=>banner::where('id',$id)->value('image')]);
        }
        banner::where('id',$id)->update($request->all());
        return redirect()->route('banner.index');
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
        banner::find($id)->delete();
        return redirect()->route('banner.index')->with('success','Xóa tài khoản thành công!');
    }

}
