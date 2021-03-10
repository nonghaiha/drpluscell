<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Product;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\User;
use App\Models\Customer;

class HomeController extends Controller
{
    public function getHome()
    {
        $pr = Product::count();
        $cat = Categories::count();
        $user = User::count();
        $cu = Customer::count();
        $or = Orders::where('status', 1)->get();
        if (request()->date_from && request()->date_to) {
            $or = Orders::where('status', 1)->whereBetween('created_at', [request()->date_from, request()->date_to])->get();
        }
        return view('backend.home', compact('or', 'pr', 'cat', 'user', 'cu'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
        $product = Product::orderby('id', 'DESC')->limit(10)->get();
        $produc = Product::orderby('id', 'ASC')->limit(6)->get();
        return view('frontend.layout.index', compact('product', 'produc'));

        // return view('frontend.layout.master');
    }

    public function list($id, $slug,Request $request)
    {
        $produ = Product::where(['id' => $id, 'slug' => $slug])->first();
        $ca = Categories::where(['id' => $id, 'slug' => $slug])->first();
        if ($ca) {
            $products = Product::where(['category_id' => $ca->id])->get();
            return view('frontend.product.category', compact('ca', 'products'));
        } else {
            $category = DB::table('category')->select('category.name')->join('product','product.category_id','=','category.id')->whereRaw('category.id = category_id')->first();
            return view('frontend.product.product', compact('produ','category'));
        }
    }

    public function getCheckout()
    {
        return view('frontend.checkout');
    }

    public function postCheckout(Request $request)
    {
        $cart = Session::get('cart');
        $order = new Orders();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->save();
        foreach ($cart as $key => $value) {
            $order_detail = new OrdersDetail();
            $order_detail->product_id = $key;
            $order_detail->orders_id = $order->id;
            $order_detail->quantity = $value['quantity'];
            $order_detail->price = $value['price'];
            $order_detail->save();
        }
        Session::forget('cart');
        return view('frontend.checkout-success')->with('thongbao', 'Đặt hàng thành công');
    }

    public function getSerch()
    {
        $products = Product::paginate(8);
        if (request()->q) {
            $products = Product::where('name', 'LIKE', '%' . request()->q . '%')->paginate(8);
        }
        return view('frontend.product.search', compact('products'));
    }

    public function getAccount()
    {
        return view('frontend.create-account');
    }

    public function postAccount(Request $request)
    {
        $this->validate($request, [
            'email' => 'unique:customer,email',
            'use_name' => 'min:6|unique:customer,use_name',
            'confirm_password' => 'same:password',
            'password' => 'min:6',
        ], [
            'email.unique' => 'Email này đã được sử dụng!',
            'use_name.unique' => 'Tài khoản này đã được sử dụng!',
            'use_name.min' => 'Tên tài khoản tối thiểu 6 kí tự!',
            'password.min' => 'Mật khẩu phải tối thiểu 6 ký tự!',
            'confirm_password.same' => 'Bạn phải nhập trùng mật khẩu!',
        ]);
        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);
        Customer::create($request->all());
        return view('frontend.success');
    }

    public function getLogin1()
    {
        return view('frontend.login-customer');
    }

    public function postLogin1(Request $request)
    {
        $this->validate($request, [
            'use_name' => 'alpha_num',
            'password' => 'min:6',
        ], [
            'use_name.alpha_num' => 'Tên tài khoản không được chứa ký tự đặc biệt',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);
        $credentials = array('use_name' => $request->use_name, 'password' => $request->password);
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('frontend.layout');
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập k thành công']);
        }
    }

    public function postLogout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('frontend.layout');
    }

    public function searchPrice($id,$slug,Request $request){
        if ($request->price !=null){
        $products = DB::table('product')->where('category_id',$id)
            ->where('price',$request->price)
            ->get();
        }else{
            $products = DB::table('product')->where('category_id',$id)
                ->get();
        }
        $output = '';
        $output .= '<div class="owl-stage-outer">';
        $output .= '<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 901px;">';
        foreach ($products as $prod) {
            $output .= '<div class="owl-item active" style="width: 169.2px; margin-right: 11px;">';
            $output .= '<div class="product">';
            $output .= ' <figure class="product-image-container">';
            $output .= '<a href="' . route('product.list', ['slug' => '' . $prod->slug . '', 'id' => '' . $prod->id . '']) . '" class="product-image">';
            $output .= '<img src="' . $prod->image . '" alt="product">';
            $output .= '</a>';
            $output .= '</figure>';
            $output .= '<div class="product-details">';
            $output .= '<div class="ratings-container">';
            $output .= '<div class="product-ratings">';
            $output .= '<span class="ratings" style="width:80%"></span>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<h2 class="product-title" style="height: 50px; overflow: hidden">';
            $output .= '<a href="' . route('product.list', ['slug' => '' . $prod->slug . '', 'id' => '' . $prod->id . '']) . '">' . $prod->name . '</a>';
            $output .= '</h2>';
            $output .= '<div class="price-box">';
            $output .= '<span class="product-price">$' . number_format($prod->price) . '</span>';

            $output .= '</div>';

            $output .= '<div class="product-action">';
            $output .= '<a href="#" class="paction add-wishlist" title="Add to Wishlist">';
            $output .= '<span>Add to Wishlist</span>';
            $output .= '</a>';

            $output .= '           <a href="' . route('cart.add', ['id' => '' . $prod->id . '', 'slug' => '' . $prod->slug . '']) . '" class="paction add-cart" title="Add to Cart">';
            $output .= '<span>Add to Cart</span>';
            $output .= '</a>';

            $output .= '<a href="#" class="paction add-compare" title="Add to Compare">';
            $output .= '<span>Add to Compare</span>';
            $output .= '</a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
        }
        $output .='</div>';
        $output .='</div>';
        echo $output;
    }

    public function productSort($id,$slug,Request $request){
        $order = $request->get('order');
        $key = explode('-',$order);
        $products = DB::table('product')->where('category_id',$id)
            ->orderBy($key[0],$key[1])
            ->get();
        $output = '';
        $output .= '<div class="owl-stage-outer">';
        $output .= '<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 901px;">';
        foreach ($products as $prod) {
            $output .= '<div class="owl-item active" style="width: 169.2px; margin-right: 11px;">';
            $output .= '<div class="product">';
            $output .= ' <figure class="product-image-container">';
            $output .= '<a href="' . route('product.list', ['slug' => '' . $prod->slug . '', 'id' => '' . $prod->id . '']) . '" class="product-image">';
            $output .= '<img src="' . $prod->image . '" alt="product">';
            $output .= '</a>';
            $output .= '</figure>';
            $output .= '<div class="product-details">';
            $output .= '<div class="ratings-container">';
            $output .= '<div class="product-ratings">';
            $output .= '<span class="ratings" style="width:80%"></span>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<h2 class="product-title" style="height: 50px; overflow: hidden">';
            $output .= '<a href="' . route('product.list', ['slug' => '' . $prod->slug . '', 'id' => '' . $prod->id . '']) . '">' . $prod->name . '</a>';
            $output .= '</h2>';
            $output .= '<div class="price-box">';
            $output .= '<span class="product-price">$' . number_format($prod->price) . '</span>';

            $output .= '</div>';

            $output .= '<div class="product-action">';
            $output .= '<a href="#" class="paction add-wishlist" title="Add to Wishlist">';
            $output .= '<span>Add to Wishlist</span>';
            $output .= '</a>';

            $output .= '           <a href="' . route('cart.add', ['id' => '' . $prod->id . '', 'slug' => '' . $prod->slug . '']) . '" class="paction add-cart" title="Add to Cart">';
            $output .= '<span>Add to Cart</span>';
            $output .= '</a>';

            $output .= '<a href="#" class="paction add-compare" title="Add to Compare">';
            $output .= '<span>Add to Compare</span>';
            $output .= '</a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
        }
        $output .='</div>';
        $output .='</div>';
        echo $output;
    }
}
