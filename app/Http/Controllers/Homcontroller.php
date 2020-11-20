<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Homcontroller extends Controller
{
    public function index(){

        //Lấy ra tất cả danh mục Cate_product
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        //Lấy ra tất cả danh mục brand_product
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_Category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand' ,'tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','1  ')->orderby('product_id','desc')->limit(9)->get(); // GIỚI HẠN 4 SẢN PHẨM
        //where('product_status','1') Tạm Thời để '1'
        return view('Pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function search(Request $request){
         //Lấy ra tất cả danh mục Cate_product
         $keywords = $request->keywords_submit;
         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

         //Lấy ra tất cả danh mục brand_product
         $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
 
         // $all_product = DB::table('tbl_product')
         // ->join('tbl_category_product','tbl_Category_product.category_id','=','tbl_product.category_id')
         // ->join('tbl_brand' ,'tbl_brand.brand_id','=','tbl_product.brand_id')
         // ->orderby('tbl_product.product_id','desc')->get();
         $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 
         return view('Pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);   
    }
}
