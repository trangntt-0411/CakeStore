@extends('master')
@section('content')
<div class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            @foreach($slide as $item)
            @if($item->id == 1) 
                <div class="carousel-item active">
                <img class="d-block w-100" src="source/images/slide/banner1.jpg" style="height: 530px"alt="Second slide">
                </div>
            @else 
                <div class="carousel-item">
                <img class="d-block w-100" src="source/images/slide/{{$item->image}}" style="height: 530px" alt="First slide">
                </div>
            @endif           
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
                <div class="list-product">
                    <h4>Sản phẩm mới</h4>
                    
                    <div class="product-details">
                        <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="row">
                        @foreach($product as $item)
                        <div class="col-sm-3" style="margin-top: 40px;">
                            <div class="product">
                                <div class="product-header">
                                    <a href="{{route('sanpham',$item->id)}}"><img src="source/images/product/{{$item->image}}"  height="200px" width="320px" alt=""></a>
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
                                    <a class="add-to-cart" href="{{route('addcart',$item->id)}}">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <!-- <a class="beta-btn primary" href="product.html">Details<i class="fa fa-chevron-right"></i></a> -->
                                    <a class="bt-details" href="{{route('sanpham',$item->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="container">
                        <div class="row link_product">{{$product->links()}}</div>
                    </div>  
                </div>


                <!-- start sale product -->
                <div class="list-product sale-product">
                    <h4>Sản phẩm khuyến mãi</h4>
                    <div class="product-details">
                        <p class="pull-left">Tìm thấy {{count($product_sale)}} sản phẩm</p>
                        <div class="clear-both"></div>
                    </div>
                    <div class="row">
                        @foreach($product_sale as $item)
                        <div class="col-sm-3" style="margin-top: 40px">
                            <div class="product">
                                <div class="product-header">
                                    <a href="{{route('sanpham',$item->id)}}"><img src="source/images/product/{{$item->image}}" height="200px" alt=""></a>
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
                                    <a class="add-to-cart" href="{{route('addcart',$item->id)}}">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <!-- <a class="beta-btn primary" href="product.html">Details<i class="fa fa-chevron-right"></i></a> -->
                                    <a class="bt-details" href="product.html">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach                   
                    </div>
                    <div class="container">
                        <div class="row link_product">{{$product_sale->links()}}</div>
                    </div>
                </div>
                <!-- end sale product-->

                <!-- start top product -->
                
                <!-- end top product -->
                
            </div>
        </div>
    </div>

</div>
@endsection
