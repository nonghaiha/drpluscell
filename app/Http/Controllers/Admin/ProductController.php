<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\Media;
use App\Models\OrdersDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * GET account.index =>url account/index
     */
    public function index()
    {
        $data['products'] = product::with('category')->orderBy('id', 'desc')->paginate(5);
        return view('backend.product.index', $data);
    }

    /**
     * GET account.create =>url account/create
     */
    public function create()
    {
        $data['categorys'] = Categories::all();
        return view('backend.product.create', $data);
    }

    /**
     * post account.store =>url acount/store
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'min:0',
        ], []);
        $slug = str_slug($request->name);
        $request['slug'] = $slug;
        $data = $request->all();
        $result = Product::create([
            'name' => $data['name'],
            'content' => $data['content'],
            'price' => $data['price'],
            'sale' => $data['sale'],
            'category_id' => $data['category_id'],
            'status' => $data['status'],
            'slug' => $data['slug']
        ]);

        if ($request->image){
            foreach ($request->image as $key => $value){
                $fileName = Carbon::now()->timestamp . '_' .generate_random_string(11) . substr($value->getClientOriginalName(), strpos($value->getClientOriginalName(),'.'));
                $value->move(storage_path('app/public/images/products'),$fileName);
                $dataMedia['product_id'] = $result['id'];
                $dataMedia['image'] = $fileName;
                Media::create([
                    'product_id' => $dataMedia['product_id'],
                    'image' => $dataMedia['image']
                ]);
            }
        }
        return redirect()->route('product.index');
    }

    /**
     * get account.edit =>url acount/1/edit
     */
    public function edit($id)
    {
        $data['categorys'] = Categories::all();
        $data['product'] = product::with('media')->find($id);
        return view('backend.product.edit', $data);
    }

    /**
     * put account.update =>url acount/1/update
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'min:0',
            'sale' => 'lt:price',
        ], []);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        product::where('id', $id)->update([
            'name' => $request['name'],
            'content' => $request['content'],
            'price' => $request['price'],
            'sale' => $request['sale'],
            'category_id' => $request['category_id'],
            'status' => $request['status']
        ]);
        if ($request->image) {
            Media::where('product_id',$id)->delete();
            foreach ($request->image as $key => $value){
                $fileName = Carbon::now()->timestamp . '_' .generate_random_string(11) . substr($value->getClientOriginalName(), strpos($value->getClientOriginalName(),'.'));
                $value->move(storage_path('app/public/images/products'),$fileName);
                $dataMedia['product_id'] = $id;
                $dataMedia['image'] = $fileName;
                Media::create([
                    'product_id' => $dataMedia['product_id'],
                    'image' => $dataMedia['image']
                ]);
            }
        }
        return redirect()->route('product.index');
    }

    /**
     * get account.show =>url acount/1
     */
    public function show($id)
    {

    }

    /**
     * delete account.show =>url acount/1
     */
    public function destroy($id)
    {
        $orderDetail = OrdersDetail::all();
        if ($orderDetail) {
            return redirect()->route('product.index')->with('error', 'Sản phẩm vẫn đang được order');
        } else {
            product::find($id)->delete();
            return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công!');
        }
    }

    public function getKho($id)
    {

        $data['product'] = product::find($id);
        $data['attributes'] = attribute::all();
        return view('backend.product.kho', $data);
    }

    public function postKho(Request $request, $id)
    {
        $this->validate($request, [
            'quantity' => 'bail|required|numeric|min:1',
        ], [
            'quantity.required' => 'Bạn chưa nhập số lượng sản phẩm !',
            'quantity.numeric' => 'Số lượng phải dạng số !',
            'quantity.min' => 'Số lượng phải lơn hơn 0 !',
        ]);
        $request['product_id'] = $id;
        $check = 1;
        $att = ProductAttribute::where('product_id', $id)->get();
        foreach ($att as $value) {
            if ($value->attribute_id == $request->attribute_id) {
                $check = 0;
            }
        }

        if ($check == 1) {
            ProductAttribute::create($request->all());
            return redirect()->route('product.index');
        } else {
            $request->offsetUnset('_token');//or
            $quantity = ProductAttribute::where('product_id', $id)->where('attribute_id', $request->attribute_id)->value('quantity');
            $quantity += $request->quantity;
            $request->merge(['quantity' => $quantity]);
            ProductAttribute::where('product_id', $id)->where('attribute_id', $request->attribute_id)->update($request->all());
            return redirect()->route('product.index')->with('success', 'Sản phẩm đã được thêm số lượng!');


        }
    }

    public function search(Request $request){
            $key = $request->search;
            $data['products'] = Product::with('category')
                ->select('product.*','category.name as category_name')
                ->join('category','category.id','=' ,'product.category_id')
                ->where('product.name','LIKE',"%${key}%")
                ->orWhere('category.name','LIKE',"%${key}%")
                ->orderBy('product.id','desc')
                ->paginate(5);
            return view('backend.product.index', $data);
    }
}
