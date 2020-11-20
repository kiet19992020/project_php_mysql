@extends("admin_layout")
@section("admin_content")
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt Kê Thương Hiệu
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
              <th>Tên Thương Hiệu</th>
              <th>Hiển Thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_brand_product as $key => $brand_pro)


            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$brand_pro->brand_name}}</td>
              <td><span class="text-ellipsis">
                  <?php
                    if($brand_pro->brand_status ==0)
                    {

                    ?>
                      <a href="{{URL::to('/unactive-brand-prodocut/'.$brand_pro->brand_id)}}"><span class="fa-thum-styling fa fa-thumbs-up"></span></a>
                    <?php
                    }
                    else {
                      ?>
                    <a href="{{URL::to('/active-brand-prodocut/'.$brand_pro->brand_id)}}"><span class="fa-thum-styling fa fa-thumbs-down"></span></a>
                    <?php
                    }
                    ?>
              </span>
              </td>

              <td>
                <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" ui-toggle-class="">
                  <i class="fa fa-check text-success text-active"></i></a>

                <a onclick="return confirm('Bạn Có chắc Muốn Xóa?')" href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" class="active" ui-toggle-class="">
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
