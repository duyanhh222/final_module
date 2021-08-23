<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('Client/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('Table/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Form/css/roboto-font.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('toast.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Form/fonts/font-awesome-5/css/fontawesome-all.min.css') }}">
	<!-- Main Style Css -->

    <link rel="stylesheet" href="{{ asset('Form/css/style.css') }}"/>
    <link rel="icon" href="{{ asset('storage/images/'.  $config->logo ) }}">
    @yield('css')
</head>

<body>
<div id="toast"></div>
<div class="super_container">

    <!-- Header -->
    @section('header')
        <header class="header">
            <!-- Top Bar -->
            <!-- Top Bar -->

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('Client/images/phone.png') }}" alt=""></div>{{ $config->phone }}</div>
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('Client/images/mail.png') }}" alt=""></div><a href="mailto:">{{ $config->email }}</a></div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="#">Tiếng Việt<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Tiếng Anh</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                @if(Session::has('user_name'))
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="#">{{Session::get('user_name')}}<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Hồ sơ</a></li>
                                                <li><a href="{{route('client.listFood')}}">Xem bài viết</a></li>
                                                <li><a href="{{route('client.bill')}}">Đơn hàng</a></li>
                                                <li><a href="{{route('user.logout')}}">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <a class="btn btn-outline-primary" href="{{ route('client.loadLogin') }}">Đăng nhập</a>
                                <a class="btn btn-outline-primary" href="{{ route('client.loadRegister') }}">Đăng ký</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ route('client.home') }}">Eat Clean</a></div>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div     class="header_search_form_container">
                                        <form method="get" action="{{ route('client.search') }}" class="header_search_form clearfix">
                                            @csrf
                                            <input type="search" name="keyword" required="required" class="header_search_input" placeholder="Tìm kiếm sản phẩm...">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">Tất cả danh mục</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">Tất cả danh mục</a></li>
                                                        @foreach($categories as $category)
                                                        <li><a class="clc" href="#">{{ $category->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('Client/images/search.png') }}" alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">


                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <a href="{{route('show.cart')}}">
                                                <img src="{{ asset('Client/images/cart.png') }}" alt="">
                                            </a>
                                            @if(Session::has('user_id'))
                                             <div class="cart_count"><span id="count_carts">{{count($carts)}}</span></div>
                                            @else
                                             <div class="cart_count"><span id="count_carts">0</span></div>
                                            @endif
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{route('show.cart')}}">Giỏ hàng</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
    @show

    @yield('content')



    @section('footer')
        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 footer_col">
                        <div class="footer_column footer_contact">
                            <div class="logo_container">
                                <div class="logo"><a href="#">Eat Clean</a></div>
                            </div>
                            <div class="footer_title">Liên hệ</div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a></li>

                                </ul>
                            </div>
                            <div class="footer_phone">{{ $config->phone }}</div>
                            <div class="footer_contact_text">
                                <p>{{ $config->email }}</p>
                                <p>{{ $config->address }}</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-2 offset-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Tìm danh mục</div>
                            <ul class="footer_list">
                                @foreach($categories as $category)
                                <li><a href="{{  route('client.category', $category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Tải về ứng dụng</div>
                            <ul class="footer_list">
                                <li><a href="#"><img src="{{ asset('Client/images/AppStore-vn.png') }}" alt="" width="150px"></a></li>
                                <li><a href="#"><img src="{{ asset('Client/images/PlayStore-vn.png') }}" alt="" width="150px"></a></li>
                                <li><a href="#"><img src="{{ asset('Client/images/Huawei-gallery-vn.png') }}" alt="" width="150px"></a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    @show

<!-- Copyright -->

    @show
</div>
<!-- Brands -->


@section('copyright')
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="" target="_blank">Tran Van An</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="{{ asset('Client/images/logos_1.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('Client/images/logos_2.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('Client/images/logos_3.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('Client/images/logos_4.png') }}" alt=""></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('Client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Client/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('Client/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('Client/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('Client/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('Client/js/custom.js') }}"></script>


<script>
$(document).ready(function(){
    $(document).on('click','#addCart', function(e){
        e.preventDefault();
        var food_id = $(this).attr('data-id');
		var user_id = $('.userId_'+food_id).val();
        var _token = $('input[name=_token]').val();
        $.ajax({
            type: "POST",
            url: "{{route('add.cart')}}",
            data:{
                food_id: food_id,
				user_id: user_id,
                _token: _token
            },
            dataType: "json",
            success: function (response) {
                document.querySelector('#toast').innerHTML = ' <div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+ response.message +'</div>';
                document.querySelector('#count_carts').innerHTML = document.querySelector('#count_carts').innerHTML = ''+response.data+'';

            }
        });
    });
});

$(document).ready(function(){

    $(document).on('click','#likee', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        $.ajax({
            type: "GET",
            url: url,
            data:{
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                document.querySelector('#toast').innerHTML = document.querySelector('#toast').innerHTML = ' <div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+ response.message +'</div>';
            }
        });
    });
});
$(document).ready(function(){

$(document).on('click','#dislikee', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');
    $.ajax({
        type: "GET",
        url: url,
        data:{
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function (response) {
            $('#child'+id).remove();
            document.querySelector('#toast').innerHTML = document.querySelector('#toast').innerHTML = ' <div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+ response.message +'</div>';

        }
    });
});
});
</script>
@yield('js')

</body>

</html>
