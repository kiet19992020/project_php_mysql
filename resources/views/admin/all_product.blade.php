@extends("admin_layout")
@section("admin_content")
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt Kê Sản Phẩm
      </div>
      
      <div class="table-responsive">
                <?php
                        $message = Session::get('message');
                        if($message)
                        {
                            echo $message;
                            Session::put('message',null);
                        }
                    ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
              </th>
              <th>Tên Sản Phẩm</th>
              <th>Giá Tiền</th>
              <th>Hình Sản Phẩm</th>
              <th>Danh Mục</th>
              <th>Thương Hiệu</th>
             
              
              <th>Hiển Thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_product as $key => $pro)


            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$pro->product_name}}</td>
              <td>{{$pro->product_price}}</td>
              <td><img src="public/upload/product/{{$pro->product_image}}"height="100" width="100"></td>
              <td>{{$pro->category_name}}</td>
              <td>{{$pro->brand_name}}</td>
              <td><span class="text-ellipsis">
                    <?php
                    if($pro->product_status == 0)
                    {
                  
                    ?>
                      <a href="{{URL::to('/unactive-prodocut/'.$pro->product_id)}}"><span class="fas fa-eye-slash"></span></a>
                    <?php  
                    }
                    else {
                      ?>
                    <a href="{{URL::to('/active-prodocut/'.$pro->product_id)}}"><span class="fa fas fa-eye"></span></a>
                    <?php } ?>
                    
              </span>
              </td>

              <td>
                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" ui-toggle-class="">
                  <i class="fa fa-check text-success text-active"></i></a>

                <a onclick="return confirm('Bạn Có chắc Muốn Xóa?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">

      
          <div class="col-sm-7 text-right text-center-xs">
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  @endsection
