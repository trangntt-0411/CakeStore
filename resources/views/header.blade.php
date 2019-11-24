
<div id="header">
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <h1 class="logo">Name Store</h1>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="GET" id="searchform" action="/">
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa...">
                        <button class="search">Tìm</button>
                    </form>
                </div>
                <div class="beta-comp">
                    <div class="cart" id="cart">
                        <div class="cart-select"><i class="fa fa-shopping-cart cart-icon"></i>Giỏ hàng
                           
                        <span class="badge"> @if(Session::has('cart')){{Session('cart')->totalQty}}@endif</span></div>
                        <div class="cart-dropdown" id="cart-drop">
                            <ul class="cart-items">
                            @foreach((Session('cart')->items) as $items)
                            <li>
                                <img src="source/images/product/{{$items['item']['image']}}" alt="">
                                <span class="item-name">{{$items['item']['name']}}</span>
                                <span class="item-price">Gía: {{$items['item']['unit_price']}}đ</span>
                                <span class="item-quantity">Số lượng: {{$items['qty']}}</span>
                                <span><i class="fa fa-trash icon-delete"></i></span>                      
                            </li>
                            @endforeach
                            </ul>
                            <div class="caption-cart">
                                <div class="cart-total">Tổng tiền: <span>{{Session('cart')->totalPrice}}đ</span></div>
                                <div class="clearfix"></div>
                                <div class="cart-order">
                                    <button class="order">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-bottom" style="background: #0277b8;">
        <div class="container">
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li class="parent-active"><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                    <li><a href="{{route('loai_sp')}}">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($p_type as $item)
                            <li><a href="{{route('loai_sp',$item->id)}}">{{$item->name}}</a></li>
                            @endforeach
                            <!-- <li><a href="product_type.html">Sản phẩm 2</a></li>
                            <li><a href="product_type.html">Sản phẩm 3</a></li> -->
                        </ul>
                    </li>
                    <li><a href="about.html">Giới thiệu</a></li>
                    <li><a href="contacts.html">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
    </div>
</div>


