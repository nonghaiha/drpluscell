<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
    GET account.index =>url account/index
    */
    public function index()
    {
       $data['categorys']=Categories::where('parent_id',1)->orderBy('id','asc')->paginate(5);
       return view('backend.category.index',$data);
    }

    /**
    GET account.create =>url account/create
    */
    public function create(Request $request)
    {
       $data['categorys']=Categories::all();
        return view('backend.category.create',$data);
    }

    /**
    post account.store =>url acount/store
    */
    public function store(Request $request)
    {
        $slug=str_slug($request->name);
        $request['slug']=$slug;
        Categories::create($request->all());
        return redirect()->route('category.index');
    }

    /**
    get account.edit =>url acount/1/edit
    */
    public function edit($id)
    {
        $data['cat_edit']=Categories::find($id);
        return view('backend.category.edit',$data);
    }

     /**
    put account.update =>url acount/1/update
    */
    public function update(Request $request,$id)
    {
        $slug=str_slug($request->name);
        $request['slug']=$slug;
        $request->offsetUnset('_token');//or $request->only('name','status');
        $request->offsetUnset('_method');
        Categories::where('id',$id)->update($request->all());
        return redirect()->route('category.index');
    }

    /**
    get account.show =>url acount/1
    */
    public function show($id)
    {

    }

    public function search(Request $request)
    {
        $input = $request->input('search');
        $categorys = DB::table('category')->where('name','LIKE','%'.$input.'%')->paginate(5);
        return view('backend.category.index',compact('categorys'));
    }

    /**
    delete account.show =>url acount/1
    */
    public function destroy($id)
    {
        $product = Product::all();
        if($product)
        {
            return redirect()->route('category.index')->with('error', 'Xóa không thành công do có sản phẩm tồn tại!');
        }
        else {
            Categories::find($id)->delete();
            return redirect()->route('category.index')->with('success', 'Xóa danh mục thành công!');
        }
    }


    public function getListCategory($id,$cap)
    {
        $data['categorys']=Categories::where('parent_id',$id)->orderBy('id','asc')->paginate(5);
        $data['subcategory']=Categories::find($id);
        $data['cap']=$cap;
        return view('backend.category.subcategory',$data);
    }
    public function getAddDMCOn($id)
    {
        $data['parent_id']=$id;
        return view('backend.category.subcat_add',$data);
    }
    public function postAddDMCOn(Request $request,$id)
    {
        $slug=str_slug($request->name);
        $request['slug']=$slug;
        $request['parent_id']=$id;
        Categories::create($request->all());
        return redirect()->route('category.index')->with('success','Thêm mới danh mục thành công !');
    }

}
