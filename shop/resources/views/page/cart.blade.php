@if(Session::has("Cart") !=  null)
<div class="cart-item">
    @foreach(Session::get("Cart")->products as $item)
    <div class="media">
        <a class="pull-left" href="#"><img src="{{asset('source/image/product')}}/{{$item['productInfo']->image}}" alt=""></a>
        <div class="media-body">
            <span class="cart-item-title">{{$item['productInfo']->name}}</span>
            <span class="cart-item-amount">{{$item['quanty']}} x <span>{{$item['productInfo']->unit_price}}</span></span>
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