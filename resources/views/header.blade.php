
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
                    <form role="search" method="GET" id="searchform" action="/">
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa...">
                        <!-- <button class="fa fa-search" type="submit" id="searchsubmit"></button> -->
                        <button class="search">Tìm</button>
                    </form>
                </div>
                <div class="beta-comp">
                    <div class="cart" id="cart">
                        <div class="cart-select"><i class="fa fa-shopping-cart cart-icon"></i>Giỏ hàng<span class="badge">3</span></div>
                        <div class="cart-dropdown" id="cart-drop">
                            <ul class="cart-items">
                                <li>
                                    <img src="images/products/cart/1.png" alt="item1">
                                    <span class="item-name">Sample Woman Top</span>
                                    <span class="item-price">$59.99</span>
                                    <span class="item-quantity">Số lượng: 01</span>
                                </li>
                                <li>
                                        <img src="images/products/cart/1.png" alt="item1">
                                        <span class="item-name">Sample Woman Top</span>
                                        <span class="item-price">$59.99</span>
                                        <span class="item-quantity">Số lượng: 01</span>
                                </li>
                                <li>
                                        <img src="images/products/cart/1.png" alt="item1">
                                        <span class="item-name">Sample Woman Top</span>
                                        <span class="item-price">$59.99</span>
                                        <span class="item-quantity">Số lượng: 01</span>
                                </li>
                            </ul>
                            <div class="caption-cart">
                                <div class="cart-total">Tổng tiền: <span>125000 đồng</span></div>
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

