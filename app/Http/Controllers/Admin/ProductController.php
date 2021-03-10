<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\OrdersDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ProductAttribute;
class ProductController extends Controller
{
     /**
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['products']=product::orderBy('id','desc')->paginate(5);
       return view('backend.product.index',$data);
    }

    /**
    GET account.create =>url account/create
    */
    public function create()
    {
        $data['categorys']=Categories::all();
       return view('backend.product.create',$data);
    }

    /**
    post account.store =>url acount/store
    */
    public function store(Request $request)
    {
        $this->validate($request,[
        'name'=>'required',
        'price'=>'min:0',
        'sale'=>'lt:price',
        ],[]);
        $slug=str_slug($request->name);
        $request['slug']=$slug;
        product::create($request->all());
        return redirect()->route('product.index');
    }

    /**
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['categorys']=Categories::all();
        $data['product']=product::find($id);
       return view('backend.product.edit',$data);
    }

    /**
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
        'name'=>'required',
        'price'=>'min:0',
        'sale'=>'lt:price',
        ],[]);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        if(!$request->image)
        {

            $request->merge(['image'=>product::where('id',$id)->value('image')]);
        }
        product::where('id',$id)->update($request->all());
        return redirect()->route('product.index');
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
        $orderDetail = OrdersDetail::all();
        if($orderDetail){
            return redirect()->route('product.index')->with('error','Sản phẩm vẫn đang được order');
        }
        else{
            product::find($id)->delete();
            return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công!');
        }
    }

    public function getKho($id)
    {

       $data['product']=product::find($id);
       $data['attributes']=attribute::all();
       return view('backend.product.kho',$data);
    }
    public function postKho(Request $request,$id)
    {
        $this->validate($request,[
        'quantity'=>'bail|required|numeric|min:1',
        ],[
            'quantity.required'=>'Bạn chưa nhập số lượng sản phẩm !',
            'quantity.numeric'=>'Số lượng phải dạng số !',
            'quantity.min'=>'Số lượng phải lơn hơn 0 !',
        ]);
        $request['product_id']=$id;
        $check=1;
        $att=ProductAttribute::where('product_id',$id)->get();
        foreach ($att  as $value) {
            if($value->attribute_id==$request->attribute_id){
                $check=0;
            }
        }

        if($check==1)
        {
            ProductAttribute::create($request->all());
            return redirect()->route('product.index');
        }else{
            $request->offsetUnset('_token');//or
            $quantity=ProductAttribute::where('product_id',$id)->where('attribute_id',$request->attribute_id)->value('quantity');
            $quantity+= $request->quantity;
            $request->merge(['quantity' => $quantity]);
            ProductAttribute::where('product_id',$id)->where('attribute_id',$request->attribute_id)->update($request->all());
            return redirect()->route('product.index')->with('success','Sản phẩm đã được thêm số lượng!');


        }
    }
}
