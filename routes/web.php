<?php

use Illuminate\Support\Facades\Route;

//fontendt
Route::get('/','Homcontroller@index');
Route::get('/trangchu','Homcontroller@index');
Route::post('/tim-kiem','Homcontroller@search');  

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');

//Thương hiệu sản phẩm
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');

Route::get('/chi-tiet-san-pham/{brand_id}','ProductController@details_product');

//backend
Route::get('admin','Admincontroller@index');
Route::get('dashboard','Admincontroller@showdashboard');
Route::post('admin-dashboard','Admincontroller@dashboard');
Route::get('logout','Admincontroller@logout');


//Categoty Product


Route::get('add-category-product','CategoryProduct@add_category_product');
Route::get('all-category-product','CategoryProduct@all_category_product');
Route::get('edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');


Route::get('unactive-category-prodocut/{category_product_id}','CategoryProduct@unactive_category_prodocut');
Route::get('active-category-prodocut/{category_product_id}','CategoryProduct@active_category_prodocut');

Route::post('save_category_product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');



//Brand Product
Route::get('add-brand-product','BrandProduct@add_brand_product');
Route::get('all-brand-product','BrandProduct@all_brand_product');
Route::get('edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');

Route::get('unactive-brand-prodocut/{brand_product_id}','BrandProduct@unactive_brand_prodocut');
Route::get('active-brand-prodocut/{brand_product_id}','BrandProduct@active_brand_prodocut');

Route::post('save_brand_product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');

//Product
Route::get('add-product','ProductController@add_product');
Route::get('all-product','ProductController@all_product');
Route::get('edit-product/{product_id}','ProductController@edit_product');
Route::get('delete-product/{product_id}','ProductController@delete_product');

Route::get('unactive-prodocut/{product_id}','ProductController@unactive_prodocut');
Route::get('active-prodocut/{product_id}','ProductController@active_prodocut');

Route::post('save_product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');


//cart

Route::post('save-cart','CartController@save_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');


//thanh toán
Route::get('/login-checkout','CheckoutControler@login_checkout');
Route::get('/logout-checkout','CheckoutControler@logout_checkout');
Route::post('/add-customer','CheckoutControler@add_customer');
Route::post('/order-place','CheckoutControler@order_place');
Route::post('/login-customer','CheckoutControler@login_customer');
Route::get('/checkout','CheckoutControler@checkout');
Route::get('/payment','CheckoutControler@payment');
Route::post('/save-checkout-customer','CheckoutControler@save_checkout_customer');

//order

Route::get('/manage-order','CheckoutControler@manage_order');
Route::get('/view-order/{orderId}','CheckoutControler@view_order');
