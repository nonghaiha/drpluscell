<?php
namespace App\Http\Controllers;
	use App\Models\Product;
	use App\Providers\Cart;
	use App\Models\Category;
	/**
	 *
	 */
	class CartController extends Controller
	{

	    public function index(){
	        return view('frontend.cartview');
        }

		public function add($id,Cart $cart)
		{
			$pro = Product::find($id);
			if($pro){
				$cart->add($pro);
			}
			return redirect()->back();
		}

    public function remove($id, Cart $cart)
    {
        $cart->remove($id);
        return redirect()->back();
    }

    public function update($id, Cart $cart)
    {
        $qtt = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $qtt);
        return redirect()->back();
    }

    public function clear(Cart $cart)
    {
        $cart->clear();
        return redirect()->back();
    }

    public function store()
    {
        return view('frontend.cartview');
    }
}

?>
