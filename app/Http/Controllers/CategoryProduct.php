<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function add_category_product(){
        return view('admin.add_category_product');
    }

    public function all_category_product(){

        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);

    }
    public function save_category_product(Request $request){
        $data = array();
        $data ['category_name'] = $request->category_product_name;
        $data ['category_desc'] = $request->category_product_desc;
        $data ['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put("message","Thêm Danh Mục Thành Công");
       return Redirect::to('add-category-product');

    }

    public function unactive_category_prodocut($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put("message","Không Kích Hoạt Danh Mục ");
        return Redirect::to('all-category-product');
    }

    public function active_category_prodocut($category_product_id){

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put("message","Kích Hoạt Danh Mục ");
        return Redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id){
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }

    public function update_category_product(Request $request,$category_product_id){
        // sửa cái function update_category_product (thêm 't' vào chữ produc)
        $data = array();
        $data ['category_name'] = $request->category_product_name;
        $data ['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put("message","Cập Nhật Danh Mục  Thành Công");
        return Redirect::to('all-category-product');
    }

    public function delete_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put("message","Xóa Danh Mục  Thành Công");
        return Redirect::to('all-category-product');
    }

    //End FUNCTION ADMIN PAGE
    public function show_category_home($category_id)
    {
         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        //Lấy ra tất cả danh mục brand_product
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        return view('Pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }

}
