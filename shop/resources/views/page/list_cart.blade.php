<table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name">Sản Phẩm</th>
                        <th class="product-price">Tên Sản Phẩm</th>
                        <th class="product-status">Giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Tổng Tiền</th>
                        <th class="product-remove">Cập Nhật</th>
                        <th class="product-remove">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has("Cart") == null)
                    <p>Chưa có sản phẩm trong giỏ hàng</p>
                    @else
                    @foreach(Session::get("Cart")->products as $item)
                    <tr class="cart_item">
                        <td class="product-name">
                            <div class="media">
                                <img class="pull-left" src="{{asset('source/image/product')}}/{{$item['productInfo']->image}}" alt="" width="90" height="90">
                            </div>
                        </td>

                        <td class="product-price">
                            <span class="amount">{{$item['productInfo']->name}}</span>
                        </td>
                        
                        <td class="product-status">
                            {{number_format($item['productInfo']->unit_price)}}
                        
                        </td>
                      
                        <td class="product-quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="{{$item['quanty']}}">
                                </div>
                            </div>
                        </td>
                         
                        <td class="product-subtotal">
                            <span >{{number_format($item['productInfo']->unit_price*$item['quanty'])}} </span>
                        </td>
                    
                        <td class="product-remove">
                            <a href="#" class="remove" title="Remove this item"><i class="fa fa-save"></i></a>
                        </td>

                        <td class="product-remove">
                            <a href="javascript:" onclick="DeleteListItemCart({{$item['productInfo']->id}});" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                   
                    @endif
                </tbody>
            </table>
    <div class="cart-totals pull-right">
        <div class="cart-totals-row"><h5 class="cart-total-title">Giỏ Hàng</h5></div>
    <div class="cart-totals-row"><span>Tổng Số Lượng:</span> <span class="cart-total-value" style="color: #ee4d2d;">{{Session::get("Cart")->totalQuanty}}</span></div>
        <div class="cart-totals-row"><span>Tổng Tiền:</span> <span class="cart-total-value" style="color: #ee4d2d;">{{number_format(Session::get("Cart")->totalPrice)}} VND</span></div>
        <div class="cart-totals-row"><a href="{{url('dat_hang')}}"  style="margin: 0 0 0 67px;"  class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>