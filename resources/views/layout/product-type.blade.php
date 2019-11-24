
@extends('master')
@section('content')
<div class="bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb">
                    <li class="pageago">
                        <a href="{{route('trang-chu')}}">Trang chủ</a>
                        <span class="sp">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </li>
                    <li class="pagenow">
                        <strong><span>{{$tp->name}}</span></strong>
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
                            @foreach($type_p as $item)
                            <li class="item-producttype"><a href="{{route('loai_sp',$item->id)}}">{{$item->name}}</a></li>
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
            <h1 class="h1_title">{{$tp->name}}</h1>
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
                        @foreach($product_type as $item)
                        
                        <div class="col-sm-3">
                            
                            <div class="product">
                                <div class="product-header">
                                    <a href="{{route('sanpham',$item->id)}}"><img src="source/images/product/{{$item->image}}" height="150px" alt=""></a>
                                </div>
                                <div class="product-body">
                                    <p class="product-title">{{$item->name}}</p>
                                    <p class="product-price">
                                        @if($item->promotion_price == 0)
                                        <span>{{$item->unit_price}}đ</span>
                                        @else
                                        <span>{{$item->promotion_price}}đ</span>
                                        <span style="text-decoration: line-through; color: gray; font-size: 15px">{{$item->unit_price}}đ</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="product-caption">
                                    <a class="add-to-cart" href="cart.html">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <!-- <a class="beta-btn primary" href="product.html">Details<i class="fa fa-chevron-right"></i></a> -->
                                    <a class="bt-details" href="#">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="space-50"></div>
                        </div>
                        @endforeach
                    </div>
                    <div class="container">
                        <div class="row link_product">{{$product_type->links()}}</div>
                    </div>  
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
@endsection