@extends('Client.Home.index')
@section('title', 'Trang chủ')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('Client/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/shop_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/shop_responsive.css') }}">
    <div class="super_container">
        <!-- Home -->
        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll"
                 data-image-src="{{ asset('Client/images/shop_background.jpg') }}"></div>
            <div class="home_overlay"></div>
            <div class="home_content d-flex flex-column align-items-center justify-content-center">
                <h2 class="home_title">Danh sách yêu thích</h2>
            </div>
        </div>
        <!-- Shop -->
        <div class="shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <!-- Shop Sidebar -->
                        <div class="shop_sidebar">
                            <div class="sidebar_section">
                                <div class="sidebar_title">Danh mục</div>
                                <ul class="sidebar_categories">
                                    @foreach($categories as $category)
                                        <li><a href="{{ route('client.category', $category->id) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <!-- Shop Content -->
                        <div class="shop_content">
                            <div class="shop_bar clearfix">
                                <div class="shop_food_count"><span>{{ count($foods) }}</span> sản phẩm được tìm
                                </div>
                                
                            </div>
                            <div class="food_grid">
                                <div class="food_grid_border"></div>
                                <!-- food Item -->
                                <div id="parent">
                                @foreach($foods as $food)
                                    <div class="product_item discount" id="child{{$food->id}}">
                                        <div class="product_border"></div>
                                        @if(asset($food->food->image))
                                        <a href="{{ route('client.food', $food->food->id) }}">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $food->food->image)}}" alt=""></div>
                                        </a>
                                            @endif
                                        <div class="product_content">
                                            @if($food->food->price_discount > 0)
                                            <div class="product_price">{{ number_format($food->food->price_discount) }}đ<span>{{ number_format($food->food->price) }}đ</span></div>
                                            @else
                                            <div class="product_price">{{ number_format($food->food->price) }}đ</div>
                                            @endif
                                            <div class="product_name"><div><a href="#" tabindex="0">
                                                        @if(strlen($food->food->name) >20)
                                                            {{ substr($food->food->name, 0, 20) }}...
                                                        @else
                                                            {{ $food->food->name }}
                                                        @endif</a></div></div>
                                            <div class="char_subtitle">
                                            </div>
                                            @if(Session::has('user_id'))
                                            <div class="product_extras">
                                            <input type="hidden" class="form-control" name="food_id" value="{{$food->food->id}}" >
                                            <input type="hidden" class="userId_{{$food->food->id}}" name="user_id" value="{{Session::get('user_id')}}" >
                                            <button type="button" class="btn btn-primary" id="addCart" data-id="{{$food->food->id}}">Thêm vào giỏ hàng</button>
                                            </div>
                                            @else
                                                <div class="product_extras">
                                                    <button type="button" class="btn btn-primary"><a href="{{route('client.login')}}" style="color:white!important">Thêm vào giỏ hàng</a></button>
                                                </div>
                                            @endif
                                        </div>
                                        @if(Session::has('user_id'))
                                           <a href="" data-url="{{route('dislike',$food->food->id)}}" id="dislikee" class="name_{{$food->id}}" data-id="{{$food->id}}">
                                                <div class="product_fav active"><i class="fas fa-heart "></i></div>
                                            </a>                                                                                         
                                        @else
                                            <a href="{{route('client.login')}}">
                                                <div class="product_fav"><i class="fas fa-heart "></i></div>
                                            </a>  
                                        @endif                                    
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{ intval((($food->food->price - $food->food->price_discount)) /
                                                                                                            $food->food->price * 100) }}%</li>

                                        </ul>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <!-- Shop Page Navigation -->
                            <div class="shop_page_nav d-flex flex-row">
                                {{ $foods->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brands -->
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
    <script src="{{ asset('Client/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('Client/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('Client/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('Client/js/shop_custom.js') }}"></script>
@endsection



