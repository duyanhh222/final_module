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

    <body>

    <div class="super_container">


        <!-- Home -->

        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll"
                 data-image-src="{{ asset('Client/images/shop_background.jpg') }}"></div>
            <div class="home_overlay"></div>
            <div class="home_content d-flex flex-column align-items-center justify-content-center">
                <h2 class="home_title">{{ $tag->name }}</h2>
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
                                        <li>
                                            <a href="{{ route('client.category', $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sidebar_section filter_by_section">
                                <div class="sidebar_title">Filter By</div>
                                <div class="sidebar_subtitle">Price</div>
                                <div class="filter_price">
                                    <div id="slider-range" class="slider_range"></div>
                                    <p>Range: </p>
                                    <p><input type="text" id="amount" class="amount" readonly
                                              style="border:0; font-weight:bold;"></p>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-9">

                        <!-- Shop Content -->

                        <div class="shop_content">
                            <div class="shop_bar clearfix">
                                <div class="shop_product_count"><span>{{ count($food_tags) }}</span> sản phẩm được tìm thấy theo tag: {{ $tag->name }}
                                </div>
                                <div class="shop_sorting">
                                    <span>Sort by:</span>
                                    <ul>
                                        <li>
                                            <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
                                            <ul>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "original-order" }'>highest rated
                                                </li>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "name" }'>name
                                                </li>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "price" }'>price
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="product_grid">
                                <div class="product_grid_border"></div>

                                <!-- Product Item -->

                                @foreach($food_tags as $food_tag)                         
                                @if($food[$food_tag->id]->restaurant != null)
                                @if($food[$food_tag->id]->restaurant->status == 2)
                                    <div class="product_item discount">
                                        <div class="product_border"></div>
                                        @if(asset($food_tag->food->image))
                                            <a href="{{ route('client.food', $food_tag->id) }}">
                                            <div
                                                class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{asset('storage/images/'. $food_tag->food->image)}}" alt=""></div>
                                            </a>
                                        @endif
                                        <div class="product_content">
                                            @if ( $food_tag->food->price_discount > 0 )
                                            <div class="product_price">{{ number_format($food_tag->food->price_discount) }}đ
                                                <span>{{ number_format($food_tag->food->price) }}đ</span>
                                            </div>
                                            @else
                                            <div class="product_price">
                                                {{ number_format($food_tag->food->price) }}đ
                                            </div>
                                            @endif
                                            <div class="product_name">
                                                <div><a href="{{ route('client.food', $food_tag->id) }}" tabindex="0">
                                                        @if(strlen($food_tag->food->name) >20)
                                                            {{ substr($food_tag->food->name, 0, 20) }}...
                                                        @else
                                                            {{ $food_tag->food->name }}
                                                        @endif
                                                    </a></div>
                                            </div>
                                            <div class="char_subtitle">
                                                @if(isset($food_tag->food->restaurant->address))
                                                    @if(strlen($food_tag->food->restaurant->address) >20)
                                                        {{ substr($food_tag->food->restaurant->address, 0, 20) }}...
                                                    @else
                                                        {{ $food_tag->food->restaurant->address }}
                                                    @endif
                                                @endif

                                                    @if(Session::has('user_id'))
                                                        
                                                            <input type="hidden" class="form-control" name="food_id" value="{{$food_tag->food->id}}" >
                                                            <input type="hidden" class="userId_{{$food_tag->food->id}}" name="user_id" value="{{Session::get('user_id')}}" >
                                                            <button type="button" class="btn btn-primary" id="addCart" data-id="{{$food_tag->food->id}}">Thêm vào giỏ hàng</button>
                                                        
                                                    @else
                                                        
                                                            <button type="button" class="btn btn-primary"><a href="{{route('client.login')}}" style="color:white!important">Thêm vào giỏ hàng</a></button>
                                                        
                                                    @endif

                                                   
                                            </div>
                                        </div>
                                        @if(Session::has('user_id'))
                                            <?php $flag = 0; ?>
                                            @foreach($like as $value)
                                                @if($value->food_id == $food_tag->food->id)
                                                    <?php $flag =1  ?>
                                                    <a href="" data-url="{{route('like',$food_tag->food->id)}}" id="likee" >
                                                        <div class="product_fav active"><i class="fas fa-heart "></i></div>
                                                    </a>
                                                @endif
                                            @endforeach
                                            @if($flag == 0)
                                                <a href="" data-url="{{route('like',$food_tag->food->id)}}" id="likee" >
                                                    <div class="product_fav"><i class="fas fa-heart "></i></div>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{route('client.login')}}">
                                                <div class="product_fav"><i class="fas fa-heart "></i></div>
                                            </a>
                                        @endif
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{ intval((($food_tag->food->price - $food_tag->food->price_discount)) /
                                                                                                            $food_tag->food->price * 100) }}%</li>
                                        </ul>
{{--                                        <form action="{{route('add.cart')}}" method="POST" role="form">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" class="form-control" name="food_id"--}}
{{--                                                   value="{{$food_tag->food->id}}">--}}
{{--                                            <input type="hidden" class="form-control" name="user_id"--}}
{{--                                                   value="{{Session::get('user_id')}}">--}}
{{--                                            <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>--}}
{{--                                        </form>--}}

                                    </div>
                                    @endif
                                    @endif
                                @endforeach
                            </div>

                            <!-- Shop Page Navigation -->

                            <div class="shop_page_nav d-flex flex-row">
                                {{ $food_tags->links() }}
                            </div>


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
    <script src="{{ asset('Client/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('Client/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('Client/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('Client/js/shop_custom.js') }}"></script>
    </body>
@endsection

