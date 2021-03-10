<?php 

return [
	[
		'name'=>'Quản trị',
		'icon'=>'fa fa-home',
		'route'=>'admin.index',
	],
	[
		'name'=>'Quản lý danh mục',
		'icon'=>'fa fa-th',
		'route'=>'category.index',
		'items'=>[
			[
				'name'=>'Danh sách danh mục',
				'icon'=>'fa-home',
				'route'=>'category.index',
	       ],
	       [
				'name'=>'Thêm mới danh mục',
				'icon'=>'fa-home',
				'route'=>'category.create',
	       ],
		],
	],
	[
		'name'=>'Quản lý tài khoản',
		'icon'=>'fa fa-user',
		'route'=>'account.index',
		'items'=>[
			[
				'name'=>'Danh sách danh mục',
				'icon'=>'fa-home',
				'route'=>'account.index',
	       ],
	       [
				'name'=>'Thêm mới danh mục',
				'icon'=>'fa-home',
				'route'=>'account.create',
	       ],
		],
	],
	[
		'name'=>'Quản lý Banner',
		'icon'=>'fa fa-picture-o',
		'route'=>'banner.index',
		'items'=>[
			[
				'name'=>'Danh sách danh mục',
				'icon'=>'fa-home',
				'route'=>'banner.index',
	       ],
	       [
				'name'=>'Thêm mới danh mục',
				'icon'=>'fa-home',
				'route'=>'banner.create',
	       ],
		],
	],
	[
		'name'=>'Quản lý sản phẩm',
		'icon'=>'fa  fa-cubes',
		'route'=>'product.index',
		'items'=>[
			[
				'name'=>'Danh sách sản phẩm',
				'icon'=>'fa-home',
				'route'=>'product.index',
	       ],
	       [
				'name'=>'Thêm mới sản phẩm',
				'icon'=>'fa-home',
				'route'=>'product.create',
	       ],
		],
	],
	[
		'name'=>'Quản lý thuộc tính',
		'icon'=>'fa  fa-puzzle-piece',
		'route'=>'attribute.index',
		'items'=>[
			[
				'name'=>'Danh sách thuộc tính',
				'icon'=>'fa-home',
				'route'=>'attribute.index',
	       ],
	       [
				'name'=>'Thêm mới thuộc tính',
				'icon'=>'fa-home',
				'route'=>'attribute.create',
	       ],
		],
	],
	[
		'name'=>'Quản lý khách hàng',
		'icon'=>'fa fa-users',
		'route'=>'customer.index',
		'items'=>[
			[
				'name'=>'Danh sách khách hàng',
				'icon'=>'fa-home',
				'route'=>'customer.index',
	       ],
	       
		],
	],
	[
		'name'=>'Quản lý hóa đơn',
		'icon'=>'fa fa-users',
		'route'=>'orders.index',
		'items'=>[
			[
				'name'=>'Danh sách hóa đơn',
				'icon'=>'fa-home',
				'route'=>'orders.index',
	       ],
	       
		],
	],
];
 ?>