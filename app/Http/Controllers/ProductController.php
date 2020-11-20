<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    //
     public function add_product(){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
    }

    public function all_product(){

        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_Category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand' ,'tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);

    }
    public function save_product(Request $request){
        $data = array();
        $data ['product_name'] = $request->product_name;
        $data ['product_price'] = $request->product_price;
        $data ['product_desc'] = $request->product_desc;
        $data ['product_content'] = $request->product_content;
        $data ['category_id'] = $request->product_cate;
        $data ['brand_id'] = $request->product_brand;
        $data ['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image)
        {
            $get_name_imgae = $get_image->getClientOriginalName(); //lay gia tri ten
            $name_imgae = current(explode('.',$get_name_imgae));
            $new_imgae = $name_imgae.rand(0,99). '.' . $get_image->getClientOriginalExtension();//lay gia tri duoi (rand(o,99)+jpg,png)
            $get_image ->move('public/upload/product',$new_imgae);
            $data['product_image'] = $new_imgae;

            DB::table('tbl_product')->insert($data);
            Session::put("message","Thêm Sản Phẩm Thành Công");
           return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put("message","Thêm Sản Phẩm Thành Công");
       return Redirect::to('all-product');

    }


    public function unactive_prodocut($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put("message","Kích Hoạt  Sản Phẩm Thành Công");
        return Redirect::to('all-product');
    }
    public function active_prodocut($product_id){

        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put("message","Không Kích Hoạt  Sản Phẩm Thành Công ");
        return Redirect::to('all-product');
    }
   
    
    public function edit_product($product_id){

        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')
        ->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function update_product(Request $request,$product_id){
        // sửa cái function update_brand_product (thêm 't' vào chữ produc)
        $data = array();
        $data ['product_name'] = $request->product_name;
        $data ['product_price'] = $request->product_price;
        $data ['product_desc'] = $request->product_desc;
        $data ['product_content'] = $request->product_content;
        $data ['category_id'] = $request->product_cate;
        $data ['brand_id'] = $request->product_brand;
        $data ['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image)
        {
            $get_name_imgae = $get_image->getClientOriginalName(); //lay gia tri ten
            $name_imgae = current(explode('.',$get_name_imgae));
            $new_imgae = $name_imgae.rand(0,99). '.' . $get_image->getClientOriginalExtension();//lay gia tri duoi (rand(o,99)+jpg,png)
            $get_image ->move('public/upload/product',$new_imgae);
            $data['product_image'] = $new_imgae;

            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put("message","cập Nhật Sản Phẩm Thành Công");
           return Redirect::to('add-product');
        }

        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put("message","Cập Nhật Sản Phẩm Thành Công");
       return Redirect::to('all-product');
    }

    public function delete_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put("message","Xóa  Sản Phẩm Thành Công");
        return Redirect::to('all-product');
    }
    //END ADMIN PAGE

    public function details_product($product_id){
         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        //Lấy ra tất cả danh mục brand_product
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

         $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_Category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand' ,'tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        //lay sa pham lien quan 
        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
        }
 
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_Category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand' ,'tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();//whereNotin trừ sản phẩm đã click


        return view('Pages.sanpham.show_details')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('product_details',$details_product)
        ->with('relate',$related_product);
    }
}
