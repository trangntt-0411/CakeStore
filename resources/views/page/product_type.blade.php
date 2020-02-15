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

    @include('header');

    <div class="bread-crumb">
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
                        <li class="pagenow">
                            <strong><span>Sản phẩm 1</span></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- content -->
    <div class="container">
        <div class="row">
            <div class="product_sidebar col-lg-3">
                <div class="p_sidebar">
                    <div class="list_sp">
                        <div class="sidebar-title">
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <div class="sidebar-content">
                            <ul class="list-producttype">
                                @foreach($p_type_name as $item)
                                <li class="item-producttype"><a href="">{{$item['name']}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="filter_size">
                        <div class="sidebar-title">
                            <span>Kích cỡ</span>
                        </div>
                        <div class="sidebar-content">
                            <ul>
                                <li class="filter-item">
                                    <label class="lon">          
                                        <input type="checkbox" id="lon" class="circle" checked name="selector">
                                        <!-- <label for="lon">Lớn</label> -->
                                        <i class="click-circle"></i>Lớn
                                    </label>
                                </li>
                                <li class="filter-item">
                                    <label for="trungbinh">
                                        <input type="checkbox" id="trungbinh" class="circle" checked name="selector">
                                        <i class="click-circle"></i>Trung bình
                                    </label>
                                </li>
                                <li class="filter-item">
                                    <label for="nho">
                                    <input type="checkbox" id="nho" class="circle" checked name="selector">
                                    <i class="click-circle"></i>Nhỏ
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-price">
                        <div class="sidebar-title">
                            <span>Theo giá</span>
                        </div>
                        <div class="sidebar-content">
                            <ul>
                                <li class="filter-item">
                                    <label for="filter_duoi100">         
                                    <input type="checkbox" id="filter_duoi100" class="circle" checked name="selector">
                                    <i class="click-circle"></i>Gía dưới 100.000đ 
                                    </label>
                                </li>
                                <li class="filter-item">
                                    <label for="filter_100den200">
                                    <input type="checkbox" id="filter_100den200" class="circle" checked name="selector">
                                    <i class="click-circle"></i>100.000đ - 200.000đ
                                    </label>
                                </li>
                                <li class="filter-item">
                                    <label for="filter_200den300">
                                    <input type="checkbox" id="filter_200den300" class="circle" checked name="selector">                                  
                                    <i class="click-circle"></i>200.000đ - 300.000đ
                                    </label>
                                </li>
                                <li class="filter-item">
                                    <label for="filter_lon300">
                                    <input type="checkbox" id="filter_lon300" class="circle" checked name="selector">
                                    <i class="click-circle"></i>Gía trên 300.000đ
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_main col-lg-9">
                <h1 class="h1_title"></h1>
                <div class="product_type">
                    <section>
                        <div class="pt_sort">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div id="sort">
                                        <label>Sắp xếp:</label>
                                        <ul class="col_ul">
                                            <li>
                                                <span>Mặc định</span>
                                                <ul class="content_ul">
                                                    <li>
                                                        <a href="">Mặc định</a>
                                                    </li>
                                                    <li>
                                                        <a href="">A -> Z</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Z -> A</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Gía tăng dần</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Gía giảm dần</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Hàng mới nhất</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Hàng cũ nhất</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="pt_view">
                        <div class="row">
                            @foreach($product as $item)
                            <div class="col-sm-3 space_bt">
                                <div class="product">
                                    <div class="product-header">
                                        <a href="{{route('product',[$item->id])}}"><img src="{{URL::to('source/images/product')}}/{{$item['image']}}" alt=""></a>
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
                                        <a class="bt-details" href="#">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="page_paginate">
                        {{$product->links()}}
                    </div>
                    <!-- <div class="pt_pagination">
                        <div class="clear-both paginate">
                            <span>Trang:</span>
                            <ul class="pagination clear-both">
                                <li class="page-item active">
                                    <a class="page_link" href="">1</a>
                                </li>
                                <li class="page-item">
                                    <a href="" class="page_link">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page_link" href="">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    @include('footer');

    <script src="app.js"></script>
</body>
</html>