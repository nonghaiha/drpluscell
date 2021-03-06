<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
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
        $product = Product::with('media')->orderby('id', 'DESC')->limit(10)->get();
        $produc = Product::with('media')->orderby('id', 'ASC')->limit(6)->get();
        return view('frontend.layout.index', compact('product', 'produc'));

        // return view('frontend.layout.master');
    }

    public function list($id, $slug,Request $request)
    {
        $produ = Product::with('media')->where(['id' => $id, 'slug' => $slug])->first();
        $ca = Categories::where(['id' => $id, 'slug' => $slug])->first();
        if ($ca) {
            $products = Product::with('media')->where(['category_id' => $ca->id])->get();
            $attribute = Attribute::orderBy('id','desc')->get();
            return view('frontend.product.category', compact('ca', 'products','attribute'));
        } else {
            $feature_product1 = Product::with('media')->orderby('id', 'ASC')->limit(3)->get();
            $feature_product2 = Product::with('media')->orderby('id', 'DESC')->limit(10)->get();
            return view('frontend.product.product', compact('produ','feature_product2','feature_product1'));
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
        if ($cart != null){
            foreach ($cart as $key => $value) {
            $order_detail = new OrdersDetail();
            $order_detail->product_id = $key;
            $order_detail->orders_id = $order->id;
            $order_detail->quantity = $value['quantity'];
            $order_detail->price = $value['price'];
            $order_detail->save();
        }
        }
        Session::forget('cart');
        return view('frontend.checkout-success')->with('thongbao', '?????t h??ng th??nh c??ng');
    }

    public function getSerch()
    {
        $products = Product::paginate(8);
        if (request()->q) {
            $products = Product::with('media')->where('name', 'LIKE', '%' . request()->q . '%')->paginate(8);
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
            'confirm_password' => 'same:password',
            'password' => 'min:6',
        ], [
            'email.unique' => 'Email n??y ???? ???????c s??? d???ng!',
            'password.min' => 'M???t kh???u ph???i t???i thi???u 6 k?? t???!',
            'confirm_password.same' => 'B???n ph???i nh???p tr??ng m???t kh???u!',
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
            'email' => 'required',
            'password' => 'min:6',
        ], [
            'email.required' => 'T??i kho???n kh??ng ???????c ????? tr???ng',
            'password.min' => 'M???t kh???u ph???i c?? ??t nh???t 6 k?? t???',
        ]);
        $credentials = array('email' => $request->email, 'password' => $request->password);
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('frontend.layout');
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => '????ng nh???p k th??nh c??ng']);
        }
    }

    public function postLogout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('frontend.layout');
    }

    public function searchPrice($id,$slug,Request $request){
        if ($request->price != null){
        $products = Product::with('media')->where('category_id',$id)
            ->where('price',$request->price)
            ->get();
        }else{
            $products = Product::with('media')->where('category_id',$id)
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
            $output .= '<img src="' .asset('storage/images/products') . '/' . $prod->media[0]->image . '" alt="product" style="width: 170px;height: 226px;object-fit: cover">';
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
            $output .= '<span class="product-price">' . number_format($prod->price) . ' VND</span>';

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

    public function searchAttribute($id, $slug, Request $request){
        if ($request->attr != null){
            $products = Attribute::with(['product_attribute' => function ($queryPA) use ($id){
                $queryPA->with(['products' => function($queryProduct) use ($id) {
                    $queryProduct->with('media')->where('category_id',$id);
                }]);
            }])->where('id',$request->attr)
                ->first();
            $output = '';
            $output .= '<div class="owl-stage-outer">';
            $output .= '<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 901px;">';
            foreach ($products->product_attribute as $prod) {
                $output .= '<div class="owl-item active" style="width: 169.2px; margin-right: 11px;">';
                $output .= '<div class="product">';
                $output .= ' <figure class="product-image-container">';
                $output .= '<a href="' . route('product.list', ['slug' => '' . $prod->products->slug . '', 'id' => '' . $prod->products->id . '']) . '" class="product-image">';
                $output .= '<img src="' .asset('storage/images/products') . '/' . $prod->products->media[0]->image . '" alt="product" style="width: 170px;height: 226px;object-fit: cover">';
                $output .= '</a>';
                $output .= '</figure>';
                $output .= '<div class="product-details">';
                $output .= '<div class="ratings-container">';
                $output .= '<div class="product-ratings">';
                $output .= '<span class="ratings" style="width:80%"></span>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '<h2 class="product-title" style="height: 50px; overflow: hidden">';
                $output .= '<a href="' . route('product.list', ['slug' => '' . $prod->products->slug . '', 'id' => '' . $prod->products->id . '']) . '">' . $prod->products->name . '</a>';
                $output .= '</h2>';
                $output .= '<div class="price-box">';
                $output .= '<span class="product-price">' . number_format($prod->products->price) . ' VND</span>';

                $output .= '</div>';

                $output .= '<div class="product-action">';
                $output .= '<a href="#" class="paction add-wishlist" title="Add to Wishlist">';
                $output .= '<span>Add to Wishlist</span>';
                $output .= '</a>';

                $output .= '           <a href="' . route('cart.add', ['id' => '' . $prod->products->id . '', 'slug' => '' . $prod->products->slug . '']) . '" class="paction add-cart" title="Add to Cart">';
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
