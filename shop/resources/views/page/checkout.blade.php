@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Checkout</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Checkout</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="{{route('DatHang')}}" method="post" class="beta-form-checkout">
        @csrf    
        <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt Hàng</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label >Họ Tên*</label>
                        <input type="text" id="name" name="name" >
                    </div>
                    @error('name')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                    <div class="form-block">
                        <label >Giới Tính*</label>
                        <input type="radio" id="gender" class="input-radio" name="gender" Value="nam" checked="checked" style="width: 10%">
                        <span style="margi-right: 10%">Nam</span>
                        <input type="radio" id="gender" class="input-radio" name="gender" Value="nữ" style="width: 10%">
                        <span style="margi-right: 10%">Nữ</span>   
                    </div>

                    <div class="form-block">
                        <label >Email*</label>
                        <input type="text" id="email" name="email" >
                    </div>
                    @error('email')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                    <div class="form-block">
                        <label >Địa Chỉ*</label>
                        <input type="text" id="adress" name="address" >
                    </div>
                    @error('address')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                    <div class="form-block">
                        <label>Điện Thoại*</label>
                        <input type="text" id="phone" name="phone" >
                    </div>
                    @error('phone')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                    <div class="form-block">
                        <label>Ghi Chú*</label>
                        <textarea id="notes" name="note"></textarea>
                    </div>
                    @error('note')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Phương Thức Thanh Toán</h5></div>
                        
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="CK" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Chuyển Khoản </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                    </div>						
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="TM" data-order_button_text="">
                                    <label for="payment_method_cheque">Thanh Toán Khi Nhận Hàng </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                    </div>						
                                </li>
                                
                                <li class="payment_method_paypal">
                                    <input id="payment_method_paypal" type="radio" class="input-radio" name="payment" value="VDT" data-order_button_text="Proceed to PayPal">
                                    <label for="payment_method_paypal">Ví Điện Tử</label>
                                    <div class="payment_box payment_method_paypal" style="display: none;">
                                        Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account
                                    </div>						
                                </li>
                            </ul>
                        </div>

                        <div class="text-center"><button type="submit" clbuttonss="beta-btn primary" >Mua Hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> 
@endsection