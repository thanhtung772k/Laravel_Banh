<div id="header">
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="{{url('source/assets/dest/images/logo-cake.png')}}" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
						@if(Session::has("Cart") ==  null)
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng(Trống)  <i class="fa fa-chevron-down"></i></div>
						@else
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng<i class="fa fa-chevron-down"></i></div>
						@endif
							<div class="beta-dropdown cart-body">
								<div id="change-item-cart">
					
								@if(Session::has("Cart") !=  null)
									<div class="cart-item">
										@foreach(Session::get("Cart")->products as $item)
										<div class="media">
											<a class="pull-left" href="#"><img src="source/image/product/{{$item['productInfo']->image}}" alt=""></a>
											<div class="media-body">
												<span class="cart-item-title">{{$item['productInfo']->name}}</span>
												@if($item['productInfo']->promotion_price !=0)
												<span class="cart-item-amount">{{$item['quanty']}} x <span>{{$item['productInfo']->promotion_price}}</span></span>
												@else
												<span class="cart-item-amount">{{$item['quanty']}} x <span>{{$item['productInfo']->unit_price}}</span></span>
												@endif
											</div>
											
										</div>
										<a class="si-close"><i class="fa fa-trash-o" style="padding: 0 0 0 286px" data-id="{{$item['productInfo']->id}}"></i></a>
								@endforeach
    								</div>
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session::get("Cart")->totalPrice)}} VND</span></div>
									<div class="clearfix"></div>
								</div>
								@endif
							</div>
								<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{url('list_cart')}}" class="beta-btn primary text-center" style="padding: 10px 90p;">Xem Giỏ  <i class="fa fa-chevron-right"></i></a>
								</div>
								<div class="center">
										
								</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #b80256;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{url('index')}}">Trang chủ</a></li>
						<li><a href="#">Danh Mục</a>
							<ul class="sub-menu">
                                @foreach($loai_sp as $loai)
                                <li><a href="{{url('loai_san_pham')}}/{{$loai->id}}">{{$loai->name}}</a></li>
                                @endforeach
							</ul>
						</li>
						<li><a href="{{url('gioi_thieu')}}">Giới thiệu</a></li>
						<li><a href="{{url('lien_he')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/> 
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script type="text/javascript" src="{{asset('source/assets/dest/js/jquery-3.6.0.js')}}"></script>
<script type="text/javascript">
		function AddCart(id){
			$.ajax({
				 url: '{{url('Add_Cart')}}/'+id,
				 type: 'GET',
			}).done(function(response){
				console.log(response);
				$("#change-item-cart").empty();
				$("#change-item-cart").html(response);
				alertify.success('Đã Thêm Mới Sản Phẩm');
			});
    	} 
		$("#change-item-cart").on("click",".si-close i", function(){
			$.ajax({
				 url: '{{url('Delete_Item_Cart')}}/'+$(this).data("id"),
				 type: 'GET',
			}).done(function(response){
				$("#change-item-cart").empty();
				$("#change-item-cart").html(response);
				alertify.success('Đã Xóa Thành Công');
			});
		});
</script>