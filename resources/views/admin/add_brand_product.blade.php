@extends("admin_layout")
@section("admin_content")
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
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
                        <form role="form" action="{{URL::to('save_brand_product')}}" method="POST">

                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                            <input type="text" class="form-control" name="brand_product_name" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Thương Hiêu</label>
                            <textarea style="resize: none" rows="5" type="password" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô Tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hiển Thị</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="0" >Hiển Thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>

                        <button type="submit" name="add-category-product" class="btn btn-info">Thêm Thương Hiệu</button>
                    </form>
                    </div>
                </div>
            </section>

    </div>
@endsection
