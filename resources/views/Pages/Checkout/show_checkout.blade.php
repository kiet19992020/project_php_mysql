@extends("layout")
@section("content")
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
              <li class="active">Thanh Toán Giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->

        

        <div class="register-req">
            <p>Đăng ký tài khoản hoặc đăng nhập để thanh toán giỏ hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
               
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Thông Tin Đơn Hàng</p>
                        <div class="form-one">
                            <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="shipping_email" placeholder="Email*">
                                <input type="text" name="shipping_name" placeholder="Họ và Tên">
                                <input type="text" name="shipping_phone" placeholder="SĐT">
                                <input type="text" name="shipping_address" placeholder="Địa Chỉ">
                                <textarea name="shipping_notes"  placeholder="Ghi Chú Đơn Hàng" rows="20" ></textarea>
                                <input type="submit" value="Gửi" name="sned_order" class="btn btn-primary btn-sm">
            
                            </form>
                        </div>
                    </div>   
                </div>
                					
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem Lại Giỏ Hàng</h2>
        </div>

        
        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->
@endsection