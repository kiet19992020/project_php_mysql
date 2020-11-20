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
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên Danh Mục</th>
              <th>Hiển Thị</th>
              <th>Thời Gian</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_category_product as $key => $cate_pro)
                
            
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$cate_pro->category_name}}</td>
              <td><span class="text-ellipsis">
                  <?php
                    if($cate_pro->category_status ==0)
                    {
                  
                    ?>
                      <a href="{{URL::to('/unactive-category-prodocut/'.$cate_pro->category_id)}}"><span class="fa-thum-styling fa fa-thumbs-up"></span></a>
                    <?php  
                    }
                    else {
                      ?>
                    <a href="{{URL::to('/active-category-prodocut/'.$cate_pro->category_id)}}"><span class="fa-thum-styling fa fa-thumbs-down"></span></a>
                    <?php } ?>
              </span>
              </td>
             
              <td>
                <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" ui-toggle-class="">
                  <i class="fa fa-check text-success text-active"></i>
                </a>
                <a onclick="return confirm('Bạn Có chắc Muốn Xóa?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">
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