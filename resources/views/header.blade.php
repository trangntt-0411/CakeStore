
<div id="header">
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <!-- <a href="index.html" id="logo"><img src="images/logo-cake.png" width="200px"></a> -->
                <h1 class="logo">Name Store</h1>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="GET" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa...">
                        <!-- <button class="fa fa-search" type="submit" id="searchsubmit"></button> -->
                        <button class="search">Tìm</button>
                    </form>
                </div>
                <!-- account -->
                <div class="beta-comp">
                    <div class="account">
                        @if(Auth::check())
                        <a href="">
                            <i class="fa fa-user cart-icon"><span class="icon-name">{{Auth::user()->full_name}}</span></i>
                            <a href="{{route('logout')}}"><i class="fa fa-sign-out cart-icon"><span class="icon-name">Đăng xuất</span></i></a>
                        </a>
                        @else
                        <a href="{{route('login')}}">
                            <i class="fa fa-user cart-icon"><span class="icon-name">Tài khoản</span></i>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="beta-comp">
                    <div class="cart" id="cart">
                   
                        @if(Session::has('cart') && $totalQty != 0)
                       
                        <div class="cart-select"><i class="fa fa-shopping-cart cart-icon"><span class="icon-name">Giỏ hàng</span><span class="badge">{{Session('cart')->totalQty}}</span></i></div>
                        <div class="cart-dropdown" id="cart-drop">
                            <ul class="cart-items">
                                @foreach($product_cart as $item)
                                <li>
                                   
                                    <img src="{{URL::to('source/images/product')}}/{{$item['item']['image']}}" alt="item1">
                                    <span class="item-name">{{$item['item']['name']}}</span>
                                    <span class="item-price">@if($item['item']['promotion_price'] == 0)
                                                                {{$item['item']['unit_price']}}đ
                                                            @else
                                                                {{$item['item']['promotion_price']}}đ
                                                            @endif
                                    </span>
                                    <span class="item-quantity">Số lượng: {{$item['qty']}}</span>
                                    <a href="{{route('removecart', $item['item']['id'])}}"><span class="icon-name"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                                  
                                </li>
                                @endforeach
                                
                            </ul>
                            <div class="caption-cart">
                                <div class="cart-total">Tổng tiền: <span>{{$totalPrice}}</span></div>
                                <div class="clearfix"></div>
                                <div class="cart-order">
                                    <button class="order">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="cart-select"><i class="fa fa-shopping-cart cart-icon"><span class="icon-name">Giỏ hàng</span><span class="badge"></span></i></div>
                        @endif
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
                        <li class="parent-active"><a href="{{route('home-page')}}">Trang chủ</a></li>
                        <li><a href="">Sản phẩm</a>
                            <ul class="sub-menu">
                                @foreach($product_type as $item)
                                <li><a href="{{route('product-type',[$item->id])}}">{{$item['name']}}</a></li>
                                @endforeach
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

