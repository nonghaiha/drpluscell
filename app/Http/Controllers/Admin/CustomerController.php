<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
class CustomerController extends Controller
{
     /** 
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['customers']=customer::orderBy('id','desc')->paginate(5);
       return view('backend.customer.index',$data);
    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
       return view('backend.customer.create');
    }

    /** 
    post account.store =>url acount/store
    */
    public function store(formUserAdd $request)
    {
       
    }

    /** 
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        
    }

     /** 
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
       
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
        customer::find($id)->delete();
        return redirect()->route('customer.index')->with('success','Xóa tài khoản thành công!');
    }
}
