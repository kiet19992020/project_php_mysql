@extends("admin_layout")
@section("admin_content")
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Thương Hiệu Sản Phẩm
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
                    @foreach ($edit_brand_product as $key => $edit_value)


                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="POST">
                                 {{-- // sai update_brand_product  --}}
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                        <input type="text" class="form-control" value="{{$edit_value->brand_name}}"
                         name="brand_product_name" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                            <textarea style="resize: none" rows="5" type="password" class="form-control"
                             name="brand_product_desc" id="exampleInputPassword1" >{{$edit_value->brand_desc}}</textarea>
                        </div>

                        <button type="submit" name="update_brand_product" class="btn btn-info">Cập Nhật Sản Phẩm</button>
                    </form>
                    </div>
                </div>
                @endforeach
            </section>

    </div>
@endsection
