@extends("layout")
@section("content")
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{URL::to('public/upload/product/'.$value ->product_image)}}" alt="" />
                                <h3>ZOOM</h3>
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                  <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                          <a href=""><img src="{{URL::to('/public/front-end/images/banner3.jpg')}}" alt="" style="width: 300px; height:80px;"></a>
                                          <a href=""><img src="{{URL::to('/public/front-end/images/banner4.jpg')}}" alt="" style="width: 300px; height:80px;"></a>
                                          
                                        </div>
                                    </div>
                                  <!-- Controls -->
                                  <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                  </a>
                                  <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                  </a>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>{{$value->product_name}}</h2>
                                <p>Mã ID: {{$value->product_id}}</p>
                                <img src="images/product-details/rating.png" alt="" />

                                <form action="{{URL::to('save-cart')}}" method="POST">
                                  {{ csrf_field() }}
                                  <span>
                                    <span>{{number_format($value->product_price).' VNĐ'}}</span>
                                    <label>Quantity:</label>
                                    <input type="number" name="qty" min="1" value="1" />
                                    <input type="hidden" name="productid_hidden"  value="{{$value->product_id}}" />
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm giỏ hàng
                                    </button>
                                </span>
                                </form>
                                
                                <p><b>Tình Trạng:</b> Còn Hàng</p>
                                <p><b>Điều Kiện:</b> Mới</p>
                                <p><b>Thương Hiệu:</b> {{$value->brand_name}}</p>
                                <p><b>Danh Mục:</b> {{$value->category_name}}</p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
        </div><!--/product-details-->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Mô Tả</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Chi Tiết Sản Phẩm</a></li>
                <li ><a href="#reviews" data-toggle="tab">Đánh Giá</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade  active in" id="details" >
                  <p>{!!$value->product_desc!!}</p>
              </div>

              <div class="tab-pane fade" id="companyprofile" >
                  <p>{!!$value->product_content!!}</p>
              </div>


              <div class="tab-pane fade" id="reviews" >
                <div class="col-sm-12">
                  <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 20220</a></li>
                  </ul>
                  <p><b>Hãy Đánh Giá Sản Phẩm/b></p>

                  <form action="#">
                    <span>
                      <input type="text" placeholder="Your Name"/>
                      <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                      Submit
                    </button>
                  </form>
                </div>
              </div>

            </div>
          </div><!--/category-tab-->
      @endforeach
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Sản Phẩm Gợi Ý</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active">

                 @foreach ($relate as $key => $lienquan)
                     <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/upload/product/'.$lienquan->product_image)}}" alt="" />

                            <h2>{{number_format($lienquan->product_price).' '.'VNĐ'}}</h2>
                            <p>{{$lienquan->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                        </div>

                </div>
                    </div>
                  </div>
                 @endforeach 
                  
                
                </div>  
              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
            </div>
            </div>
          </div><!--/recommended_items-->
@endsection
