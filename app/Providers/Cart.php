<?php
	namespace App\Providers;

	use Illuminate\Support\Facades\Log;

/**
	 *
	 */
	class Cart
	{
		public $items =[];
		public $total_quantity;
		public $total_price;
		function __construct()
		{
			$this->items=session('cart') ?  session('cart') : [];
			$this->total_quantity=$this->get_total_quantity();
			$this->total_price=$this->get_total_price();
		}

		public function add($pro){
			$item = [
				'id' => $pro->id,
				'name' => $pro->name,
				'image'=> $pro->image,
                'slug' => $pro->slug,
				'price' => $pro->sale_price ? $pro->sale_price : $pro->price,
				'quantity' => 1
			];
			if(isset($this->items[$pro->id])){
				$this->items[$pro->id]['quantity']+=1;
			}
			else{
				$this->items[$pro->id] = $item;
			}
			session(['cart' => $this->items]);
		}

		public function remove($id){
			if($this->items[$id]){
				unset($this->items[$id]);
			}
			session(['cart' => $this->items]);
		}

		public function update($id,$qtt){
			if(isset($this->items[$id])){
				$this->items[$id]['quantity'] = $qtt;
			}
			session(['cart' => $this->items]);
		}

		public function clear(){
			session(['cart' => []]);
		}
		private function get_total_quantity(){
			$tong=0;
			foreach ($this->items as $item) {
				$tong += $item['quantity'];
			}
			return $tong;
		}
		private function get_total_price(){
			$tong=0;
                foreach ($this->items as $item) {
                    $tong += $item['quantity'] * $item['price'];
                }
			return $tong;
		}
	}
 ?>
