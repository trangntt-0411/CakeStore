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

    <!-- container -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="list-product">
                    <h3>Giỏ hàng</h3>
                    <form action="{{route('checkout')}}" method="POST" class="page-cart table-wrap">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <table class="cart-table">
                            <thead class="cart-header">
                                <tr>
                                    <th class="text-center">Thông tin chi tiết sản phẩm</th>
                                    <th class="text-center">Đơn giá</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Tổng giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::has('cart'))
                                @foreach(Session::get('cart')->items as $item)
                                <tr class="cart-row">
                                    <td data-label="Sản phẩm" class="inf_p">
                                        <a href="{{route('product',$item['item']['id'])}}" class="cart-image">
                                            <img src="{{URL::to('source/images/product')}}/{{$item['item']['image']}}">
                                        </a>
                                        <a href="{{route('product',$item['item']['id'])}}" class="cart-namep">{{$item['item']['name']}}</a>
                                        <a href="{{route('removecart', $item['item']['id'])}}" class="cart-remove">Xóa</a>
                                    </td>
                                    
                                    <td data-label="Đơn giá">
                                        <span class="cart-info">{{$item['price']}}đ</span>
                                    </td>
                                    <td data-label="Số lượng">
                                        <span class="cart-info">{{$item['qty']}}</span>
                                    </td>
                                    <td data-label="Tổng giá">
                                        <span class="cart-info">{{$item['price']*$item['qty']}}</span>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <hr>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="check-form">
                                        <label for="Name">Họ tên</label>
                                        <input type="text" id="Name" name="name" class="input-full">
                                        <label for="Address">Địa chỉ nhận</label>
                                        <input type="text" id="Address" name="address" class="input-full">
                                        <!-- <label for="Time">Thời gian nhận</label>
                                        <input type="text" id="Time" name="time" class="input-full"> -->
                                        <label for="Phone">Số điện thoại</label>
                                        <input type="text" id="Phone" name="phone" class="input-full">
                                        <label for="Message">Ghi chú</label>
                                        <textarea rows="5" id="Message" name="message" class="input-full"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="inf-checkout">
                                        @if(Session::has('cart'))
                                        <p>Tổng tiền: <span class="checkout-total">{{Session::get('cart')->totalPrice}}</span></p>
                                        <br>
                                        @endif
                                        <p><em>Vận chuyển</em></p>
                                        <br>
                                        <button type="submit" name="update" class="checkout-btn">Cập nhật</button>
                                        
                                        <button type="submit" class="checkout-btn" href="">Thanh toán</button>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end container -->

    <!-- start footer -->
    @include('footer');
    <!-- end footer -->

    
    <script src="{{URL::to('source/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>