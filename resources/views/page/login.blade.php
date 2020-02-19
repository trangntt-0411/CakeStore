<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Trang chủ</title>
    
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{URL::to('source/css/style.css')}}">
</head>
<body>
    
    @include('header')

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="grid">
                    <div class="grid_item">
                        <div class="space-50"></div>
                        <h1>Đăng nhập</h1>
                        <div class="form-vertical">
                            <form action="{{route('login')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @if(Session::has('flag'))
                                <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                                @endif
                                <input type="email" name="email" class="input-full" placeholder="Email">
                                <input type="password" name="password" class="input-full" placeholder="Mật khẩu">

                                <button type="submit" class="btn btn-full">Đăng nhập</button>
                                <div class="space-40"></div>
                                <a href="{{route('home-page')}}">Trở về</a><br>
                                <a href="{{route('register')}}">Đăng kí</a><br>
                                <a href="">Quên mật khẩu?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @include('footer')
</body>
</html>