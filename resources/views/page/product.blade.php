<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loại sản phẩm</title>

    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{URL::to('source/css/style.css')}}">
</head>
<body>
    <!-- header -->
    @include('header');

    <!-- <div class="bread-crumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb">
                        <li class="pageago">
                            <a href="index.html">Trang chủ</a>
                            <span class="sp">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </li>
                        <li class="pageago">
                            <a href="index.html">Sản phẩm 1</a>
                            <span class="sp">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </li>
                        <li class="pagenow">
                            <strong><span>Sản phẩm</span></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end header -->

    <!-- content -->
    <div class="container">
        <div class="space-50"></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{URL::to('source/images/product')}}/{{$product['image']}}">
                    </div>
                    <div class="col-sm-8">
                        <div class="p_title">
                            <div class="p_name">{{$product['name']}}</div>
                            <div class="p_price">
                                @if($product['promotion_price'] == 0) 
                                <p class="sale_price">{{$product['unit_price']}}</p>
                                @else                            
                                <p class="sale_price">{{$product['promotion_price']}} đ</p>
                                <del class="now_price">{{$product['unit_price']}} đ</del>
                                @endif
                            </div>
                        </div>
                        <div class="space-20"></div>
                        <div class="p_desc">
                            <p>{{$product['description']}}</p>
                        </div>
                        <div class="space-20"></div>
                        <div class="p_form_button">
                            <div class="p_form_button_content">
                                <div class="soluong">
                                    <label class="lb_soluong">Số lượng</label>
                                    <div class="p_number">
                                        <button class="button_quty button_quty_left" id="left">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        
                                        <input type="text" id="quty" value="1" class="p_quantity">
                                        <button class="button_quty button_quty_right" id="right">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button_addcart">
                            <button type="submit" class="add_cart" id="add_cart">
                                <span class="btn_addcart_text"><a href="{{route('addcart', $product['id'])}}">Thêm vào giỏ hàng</a></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="space-50"></div>
                <div class="info-des">
                    <div class="p_info-des">
                        <ul class="info-des_title">
                            <li class="tab_link">
                                <h3><span class="tablink active" id="thongtinsp">Thông tin sản phẩm</span></h3>
                            </li>
                            <li class="tab_link">
                                <h3><span class="tablink" id="thongtinkhac">Thông tin khác</span></h3>
                            </li>
                        </ul>
                        <div class="tab_float">
                            <div id="tab1" class="tab_content">
                                <div class="tf_content" id="Thông tin sản phẩm">
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                            <div id="tab2" class="tab_content">
                                <div class="tf_content" id="Thông tin khác">
                                    <p>2 Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="space-50"></div>
                <div class="product_list">
                    <h4>Có thể bạn sẽ thích</h4>
                    <div class="row">
                        @foreach($p_type as $item)
                        <div class="col-sm-3">
                            <div class="product">
                                <div class="product-header">
                                    <a href="{{route('product', [$item->id])}}"><img src="{{URL::to('source/images/product')}}/{{$item['image']}}" alt=""></a>
                                </div>
                                <div class="product-body">
                                    <p class="product-title">{{$item['name']}}</p>
                                    <p class="product-price">
                                        <span>
                                        @if($item['promotion_price'] == 0)
                                            {{$item['unit_price']}}đ
                                        @else
                                            <span>{{$item['promotion_price']}}đ</span>
                                            <span class="p_unit_price"><del>{{$item['unit_price']}}đ</del></span>
                                        @endif
                                        </span>
                                    </p>
                                </div>
                                <div class="product-caption">
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <!-- <a class="beta-btn primary" href="product.html">Details<i class="fa fa-chevron-right"></i></a> -->
                                    <a class="bt-details" href="{{route('product', [$item->id])}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="page_paginate">
                        {{$p_type->links()}}
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-3">
                <div class="product_left">
                    <h3 class="p_left-title">Sản phẩm liên quan</h3>
                    <div class="p_left-body">
                        <div class="p_left-list">
                            <div class="p_left-item">
                                <a href="#">
                                    <img src="images/products/sales/1.png" alt>
                                </a>
                                <div class="pl_body">
                                    <span class="pl_name">Sản phẩm abcabc</span>
                                    <span class="pl_price">123000đ</span>
                                </div>
                                <hr>
                            </div>
                            
                            <div class="p_left-item">
                                <a href="#">
                                    <img src="images/products/sales/1.png" alt>
                                </a>
                                <div class="pl_body">
                                    <span class="pl_name">Sản phẩm abcabc</span>
                                    <span class="pl_price">123000đ</span>
                                </div>
                               
                            </div>
                            <div class="p_left-item">
                                <a href="#">
                                    <img src="images/products/sales/1.png" alt>
                                </a>
                                <div class="pl_body">
                                    <span class="pl_name">Sản phẩm abcabc</span>
                                    <span class="pl_price">123000đ</span>
                                </div>
                                <hr>
                            </div>
                            <div class="p_left-item">
                                <a href="#">
                                    <img src="images/products/sales/1.png" alt>
                                </a>
                                <div class="pl_body">
                                    <span class="pl_name">Sản phẩm abcabc</span>
                                    <span class="pl_price">123000đ</span>
                                </div>
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="space-50"></div>
                <div class="product_left">
                    <h3 class="p_left-title">Sản phẩm mới</h3>
                    <div class="p_left-body">
                        <div class="p_left-list">
                            <div class="p_left-item">
                                <a href="#">
                                    <img src="images/products/sales/1.png" alt>
                                </a>
                                <div class="pl_body">
                                    <span class="pl_name">Sản phẩm abcabc</span>
                                    <span class="pl_price">123000đ</span>
                                </div>
                                <hr>
                            </div>
                            
                            <div class="p_left-item">
                                <a href="#">
                                    <img src="images/products/sales/1.png" alt>
                                </a>
                                <div class="pl_body">
                                    <span class="pl_name">Sản phẩm abcabc</span>
                                    <span class="pl_price">123000đ</span>
                                </div>
                                
                            </div>
                            <div class="p_left-item">
                                <a href="#">
                                    <img src="images/products/sales/1.png" alt>
                                </a>
                                <div class="pl_body">
                                    <span class="pl_name">Sản phẩm abcabc</span>
                                    <span class="pl_price">123000đ</span>
                                </div>
                                <hr>
                            </div>
                            <div class="p_left-item">
                                <a href="#">
                                    <img src="images/products/sales/1.png" alt>
                                </a>
                                <div class="pl_body">
                                    <span class="pl_name">Sản phẩm abcabc</span>
                                    <span class="pl_price">123000đ</span>
                                </div>
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- end content -->

    <!-- footer -->
    @include('footer');

    <script src="{{URL::to('source/app.js')}}"></script>
</body>
</html>