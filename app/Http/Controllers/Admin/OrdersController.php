<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
class OrdersController extends Controller
{
     /** 
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['orders']=orders::orderBy('id','desc')->paginate(5);
       return view('backend.orders.index',$data);
    }

    /** 
    GET account.create =>url account/create
    */
    public function create()
    {
       return view('backend.orders.create');
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
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $status=orders::where('id',$id)->value('status');
        if($status==2&&$request->status==1)
        {
            return redirect()->back()->with('error','Hàng đang được vận chuyển');
        }
        elseif($status==3&&$request->status==1)
        {
            return redirect()->back()->with('error','Hàng đã được thanh toán');
        }
        elseif($status==3&&$request->status==2)
        {
            return redirect()->back()->with('error','Hàng đã được thanh toán');
        }
        elseif($status==3&&$request->status==3)
        {
            return redirect()->back()->with('error','Hàng đã được thanh toán');
        }
        else{
            orders::where('id',$id)->update($request->all());
        return redirect()->route('orders.index')->with('success','cập nhật trạng thái thành công');
        }
    }

    /** 
    get account.show =>url acount/1
    */
    public function show($id)
    {
        $data['orders']=orders::find($id);
        return view('backend.orders.show',$data);
    }

    /** 
    delete account.show =>url acount/1
    */
    public function destroy($id)
    {
        orders::find($id)->delete();
        return redirect()->route('orders.index')->with('success','Xóa tài khoản thành công!');
    }
}
