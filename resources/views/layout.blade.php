<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | NTK-Moible </title>
    <link href="{{asset('public/front-end/css/bootstrap.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('public/front-end/css/font-awesome.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('public/front-end/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/front-end/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/front-end/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/front-end/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/front-end/css/responsive.css')}}" rel="stylesheet">
	<script src="https://kit.fontawesome.com/2066070c74.js" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('public/front-end/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-Phone"></i> 0913463624</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> kietnguyen1147@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						{{-- <div class="logo pull-left">
							<a href="index.html"><img src="" alt="" /></a>
							
						</div> --}}
						<div class="companyinfo">
							<h2 style="font-weight: bold;font-size:30px"><span>NTK</span>-Moible</h2>
							<p>Uy tín làm nên thương hiệu</p>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="Phone-menu pull-right">
							<ul class="nav navbar-nav">
	
								<li><a href="#"><i class="fas fa-heart"></i> Yêu Thích</a></li>
								
								<?php
								$customer_id = Session::get('customer_id');
								$shipping_id = Session::get('shipping_id');

								if($customer_id !=NULL && $shipping_id==NULL){

								
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>
								<?php
								}elseif($customer_id !=NULL && $shipping_id!=NULL){ 
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>
								<?php
								} 
								?>
								
								<li><a href="{{URL::to('/show-cart')}}" style="font-weight: bold"><i class="fas fa-cart-arrow-down"></i> Giỏ Hàng</a></li>

								<?php
								$customer_id = Session::get('customer_id');
								if($customer_id !=NULL){
								?>

								<li><a href="{{URL::to('/logout-checkout')}}"style="font-weight: bold" ><i class="fa fa-lock"></i> Đăng Xuất</a></li>
								
								<?php
								}else{ 
								?>

								
								<li><a href="{{URL::to('/login-checkout')}}"style="font-weight: bold" ><i class="fa fa-lock"></i> Đăng Nhập</a></li>
								<?php
								} 
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trangchu')}}" style="font-weight: bold;font-size:23px" class="active">Trang Chủ</a></li>
								<li class="dropdown"><a href="#" style="font-weight: bold">Sản Phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="#">Điện Thoại</a></li>
										<li><a href="#">Phụ Kiện</a></li>
										<li><a href="#">Đồng Hồ Thông Minh</a></li>
										<li><a href="#">Lap top</a></li>
										
                                    </ul>
                                </li>
                                </li>
								<li><a href="{{URL::to('/show-cart')}}" style="font-weight: bold">Giỏ Hàng</a></li>
								<li><a href="contact-us.html" style="font-weight: bold">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-7">
						<form action="{{URL::to('tim-kiem')}}" method="POST">
							{{ csrf_field() }}
							<div class="col-sm-8">
								<input type="text" size="57" style="border-radius: 10px;" name="keywords_submit" placeholder="Tìm Kiếm Sản Phẩm" />
							
							</div>
							<div class="col-sm-3">
								
								<input type="submit" name="search_items" style="margin-top:0; border-radius: 10px; color:black" class="btn btn-d btn-primary btn-sm" value="Tìm Kiếm">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	{{-- <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-11">
									<img src="{{('public/front-end/images/banner1.jpg')}}" class="banner img-responsive" style="width: 100%;height:300px;" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-11">
									<img src="{{('public/front-end/images/banner2.jpg')}}" class="banner img-responsive" style="width: 100%;height:300px;" alt="" />
								</div>
							</div>
						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider--> --}}

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								
								<div class="col-sm-11">
									<img src="{{URL::to('public/front-end/images/banner1.jpg')}}" class="banner img-responsive" style="width: 100%;height:300px;" alt="" />
									
								</div>
							</div>
							<div class="item">
								
								<div class="col-sm-11">
									<img src="{{URL::to('public/front-end/images/banner2.jpg')}}" class="banner img-responsive" style="width: 100%;height:300px;" alt="" />
									<img src="images//pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">	
								<div class="col-sm-11">
									<img src="{{URL::to('public/front-end/images/banner3.jpg')}}" class="banner img-responsive" style="width: 100%;height:300px;" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							<div class="item">	
								<div class="col-sm-11">
									<img src="{{URL::to('public/front-end/images/banner5.png')}}" class="banner img-responsive" style="width: 100%;height:300px;" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>

							

							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->


<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh Mục Sản Phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $key => $cate) {{-- Vòng lặp lấy ra danh mục sản phẩm --}}
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
                            @endforeach
						</div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->
							<h2>Thương Hiệu Sản Phẩm</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $brand) {{-- Vòng lặp lấy ra thương hiệu sản phẩm --}}
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
                                     @endforeach
								</ul>
							</div>
						</div><!--/brands_products-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
					@yield("content")
				</div>
			</div>
		</div>
    </section>



	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>NTK</span>-Mobile</h2>
							<p>Bảo hành  12 tháng 1 đổi 1 khi lỗi</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{URL::to('public/front-end/images/banner3.jpg')}}" alt=""  />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
							</div>
						</div>


						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{URL::to('public/front-end/images/banner4.jpg')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{URL::to('public/front-end/images/banner5.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{URL::to('public/front-end/images/banner6.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Thương Hiệu Sản Phẩm</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Apple</a></li>
								<li><a href="#">Sonny</a></li>
								<li><a href="#">Samsung</a></li>
								<li><a href="#">LG</a></li>
								<li><a href="#">Xiaomi</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Danh Mục sản Phẩm</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điện Thoại</a></li>
								<li><a href="#">Laptop</a></li>
								<li><a href="#">Dồng hồ thông minh</a></li>
								<li><a href="#">Phụ Kiẹn</a></li>
						
							</ul>
						</div>
					</div>
					
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>NTK</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Email" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Thông tin tài khoản</p>
							</form>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Map</h2>
							<img src="{{URL::to('public/front-end/images/map.png')}}" alt="" />
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left"> NTK-Mobile Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span>NTK</span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="{{asset('public/front-end/js/jquery.js')}}"></script>
	<script src="{{asset('public/front-end/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/price-range.js')}}"></script>
    <script src="{{asset('public/front-end/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/front-end/js/main.js')}}"></script>
</body>
</html>
