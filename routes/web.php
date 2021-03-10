<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/',function(){
//      return view('frontend.layout.master');
// });

Route::group(['prefix' => 'login','namespace' => 'admin','middleware'=>'CheckLogin'], function () {
        Route::get('/','LogInController@getLogIn')->name('login');
        Route::post('/','LogInController@postLogIn')->name('postLogin');
});
Route::get('/admin','Admin\HomeController@logout')->name('logout');

Route::group(['prefix' => 'admin','namespace' => 'admin','middleware'=>'CheckLogout'], function () {
        Route::get('/home','HomeController@getHome')->name('admin.index');

       include_once 'admin/account.php';
       Route::post('acount/api-check-email','AccountController@checkEmail');
       Route::post('acount/api-check-name','AccountController@checkName');

       include_once 'admin/banner.php';
       include_once 'admin/category.php';
       Route::post('/category/search','CategoryController@search')->name('category.search');
       Route::get('/DMcon-{id}-{cap}','CategoryController@getListCategory')->name('dm_con_category');
       Route::get('/addDMcon-{id}','CategoryController@getAddDMCOn')->name('get_add_dm_con_category');
       Route::post('/addDMcon-{id}','CategoryController@postAddDMCOn')->name('post_add_dm_con_category');

       include_once 'admin/attribute.php';
       Route::get('/kho-{id}','ProductController@getKho')->name('get.product.kho');
       Route::post('/kho-{id}','ProductController@postKho')->name('post.product.kho');
       include_once 'admin/product.php';

       include_once 'admin/customer.php';
       include_once 'admin/orders.php';




      //Category
        // Route::group(['prefix' => 'category'], function () {
        //      Route::get('/','CategoryController@getCategory')->name('admin.category.index');
        //      Route::get('/list-{id}-{cap}','CategoryController@getListCategory')->name('list_category');

        //      Route::get('add','CategoryController@getCategoryAdd')->name('admin.category.add');
        //      Route::post('/add','CategoryController@postCategoryAdd')->name('post_category_add');

        //      Route::get('/edit/{id}','CategoryController@getCategoryEdit')->name('get_category_edit');
        //      Route::post('/edit/{id}','CategoryController@postCategoryEdit');

        //      Route::post('/delete/{id}','CategoryController@getCategoryDelete')->name('post_category_delete');

        //      Route::get('/search','CategoryController@searchCategory')->name('search_category');
        // });

    });
  Route::get('/','Admin\HomeController@index')->name('frontend.layout');
  Route::get('/{id}-{slug}','Admin\HomeController@list')->name('product.list');
  Route::post('/{id}-{slug}/sort','Admin\HomeController@productSort')->name('product.sort');
  Route::post('/{id}-{slug}/search','Admin\HomeController@searchPrice')->name('home.search.price');
  Route::get('/cart-add/{id}','CartController@add')->name('cart.add');
  Route::get('/cart-remove/{id}','CartController@remove')->name('cart.remove');
  Route::get('/cart-update/{id}','CartController@update')->name('cart.update');
  Route::get('/clear','CartController@clear')->name('cart.clear');
  Route::get('checkout','Admin\HomeController@getCheckout')->name('checkout');
  Route::post('checkout','Admin\HomeController@postCheckout')->name('checkout');
  Route::get('search','Admin\HomeController@getSerch')->name('home.search');
  Route::get('customer','Admin\HomeController@getAccount')->name('home.account');
  Route::post('customer','Admin\HomeController@postAccount')->name('home.account');
  Route::get('customerlog','Admin\HomeController@getLogin1')->name('home.login');
  Route::post('customerlog','Admin\HomeController@postLogin1')->name('home.login');
  Route::get('customerlogout','Admin\HomeController@postLogout')->name('home.logout');
  Route::get('/contact',function(){
      return view('frontend.contact');
  })->name('contact.index');
    Route::get('/cart','CartController@index')->name('cart.process');
  Route::get('about',function(){
      return view('frontend.about');
  })->name('about.index');
    Route::get('blog',function(){
      return view('frontend.blog');
  })->name('blog');
Route::get('single',function(){
      return view('frontend.single');
  })->name('single');
