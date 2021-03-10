<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Validator;
class AttributeController extends Controller
{
     /** 
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['attributes']=attribute::orderBy('id','desc')->paginate(5);
       return view('backend.attribute.index',$data);
    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
       return view('backend.attribute.create');
    }

    /** 
    post account.store =>url acount/store
    */
    public function store(Request $request)
    {
        $this->validate($request,[
           'color'=>'bail|required',
           'size'=>'bail|required',
           'name'=>'bail|required|unique:attribute,name',
        ],[
            'color.required'=>'Bạn chưa nhập màu sắc !',
            'size.required'=>'Bạn chưa nhập size !',
            'name.required'=>'Bạn chưa nhập tên thuộc tính !',
            'name.unique'=>'Tên thuộc tính đã tồn tại !',
        ]);
        attribute::create($request->all());
        return redirect()->back();
    }

    /** 
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['attributes']=attribute::orderBy('id','desc')->paginate(5);
        $data['attribute']=attribute::find($id);
       return view('backend.attribute.edit',$data);
    }

     /** 
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
           'color'=>'bail|required',
           'size'=>'bail|required',
           'name'=>'bail|required|unique:attribute,name,'.$id,
        ],[
            'color.required'=>'Bạn chưa nhập màu sắc !',
            'size.required'=>'Bạn chưa nhập size !',
            'name.required'=>'Bạn chưa nhập tên thuộc tính !',
            'name.unique'=>'Tên thuộc tính đã tồn tại !',
        ]);
        $request->offsetUnset('_token');//or $request->only('name','status');
        $request->offsetUnset('_method');
        attribute::where('id',$id)->update($request->all());
        return redirect()->route('attribute.index');
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
        attribute::find($id)->delete();
        return redirect()->route('attribute.index')->with('success','Xóa thuộc tính thành công!');
    }
}
