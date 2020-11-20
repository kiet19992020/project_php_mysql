@extends("admin_layout")
@section("admin_content")
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Sản Phẩm
                </header>
                <?php
                        $message = Session::get('message');
                        if($message)
                        {
                            echo $message;
                            Session::put('message',null);
                        }
                    ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('save_product')}}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="Tên Sản phẩm">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Giá Sản phẩm</label>
                            <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" placeholder="Giá Sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh Sản phẩm</label>
                            <input type="file" class="form-control" name="product_image" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                            <textarea style="resize: none" rows="5" type="password" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô Tả Sản Phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
                            <textarea style="resize: none" rows="5" type="password" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội Dung Sản Phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh Mục Sản Phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                              @foreach($cate_product as $key=>$cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thương Hiệu</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key=>$brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hiển Thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0" >Hiển Thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="add-product" class="btn btn-info">Thêm Sản Phẩm</button>
                    </form>
                    </div>
                </div>
            </section>

    </div>
@endsection
