<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <base href="{{asset('')}}"/>

    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{URL::to('source/css/style.css')}}">
</head>
<body>

    <!-- header -->
    @include('header')

    <!-- slide -->
    <div class="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="source/images/slide/banner1.jpg" class="d-block w-100" alt="First Slide" >
                </div>
                @foreach($slide as $item)
                <div class="carousel-item">
                    <img src="source/images/slide/{{$item['image']}}" class="d-block w-100" alt="">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- container -->
    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-12">
                    <!-- new product -->
                    <div class="list-product">
                        <h3>Sản phẩm mới</h3>
                        
                        <!-- <div class="product-details">
                            <p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
                            <div class="clear-both"></div>
                        </div> -->
                        <div class="space-40"></div>
                        <div class="row">
                            @foreach($new_product as $item)
                            <div class="col-sm-3 space_bt">
                                <div class="product">
                                    <div class="product-header">
                                        <a href="{{route('product',[$item->id])}}"><img src="source/images/product/{{$item['image']}}" alt=""></a>
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
                                        <a class="bt-details" href="product.html">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>
                        <div class="page_paginate">
                            {{$sale_product->links()}}
                        </div>
                    </div>
                    

                    <!-- start sale product -->
                    <div class="list-product sale-product">
                        <h3>Sản phẩm khuyến mãi</h3>
                        <!-- <div class="product-details">
                            <p class="pull-left">Tìm thấy  sản phẩm</p>
                            <div class="clear-both"></div>
                        </div> -->
                        <div class="space-40"></div>
                        <div class="row">
                            @foreach($sale_product as $item)
                            <div class="col-sm-3 space_bt">
                                <div class="product">
                                    <div class="product-header">
                                        <a href="{{route('product',[$item->id])}}"><img src="source/images/product/{{$item['image']}}" alt=""></a>
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
                                        <a class="bt-details" href="{{route('product',[$item->id])}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="page_paginate">
                            {{$sale_product->links()}}
                        </div>
                    </div>
                    <!-- end sale product-->

                    
                </div>
            </div>
        </div> 
    </div>
    <!-- end container -->

    <!-- start footer -->
    @include('footer');
    <!-- end footer -->

    
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>