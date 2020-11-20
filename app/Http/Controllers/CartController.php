<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request){

        $productId = $request->productid_hidden;
        $quatity = $request->qty;
        
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();

        
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);

        $data['id'] =$product_info->product_id;
        $data['qty'] =$quatity;
        $data['name'] =$product_info->product_name;
        $data['price'] =$product_info->product_price;
        $data['weight'] ='123';
        $data['options']['image'] =$product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
       
    }
    
    public function show_Cart(){
         //Lấy ra tất cả danh mục Cate_product
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

         //Lấy ra tất cả danh mục brand_product
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('Pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_Cart;
        $qty = $request->Cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}

