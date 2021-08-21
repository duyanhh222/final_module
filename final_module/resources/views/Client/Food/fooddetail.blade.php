@extends('Client.Home.index')

@section('title', 'Chi tiết sản phẩm')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('Client/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/product_responsive.css') }}">


    <body>

    <div class="super_container">

        <!-- Header -->



        <!-- Single Product -->

        <div class="single_product">
            <div class="container">
                <div class="row">

                    <!-- Images -->
{{--                    <div class="col-lg-2 order-lg-1 order-2">--}}
{{--                        <ul class="image_list">--}}
{{--                            <li data-image="{{asset('storage/images/' . $food->image) }}"><img src="{{asset('storage/images/' . $food->image) }}" alt=""></li>--}}
{{--                            <li data-image="{{asset('storage/images/' . $food->image) }}"><img src="{{asset('storage/images/' . $food->image) }}" alt=""></li>--}}
{{--                            <li data-image="{{asset('storage/images/' . $food->image) }}"><img src="{{asset('storage/images/' . $food->image) }}" alt=""></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

                    <!-- Selected Image -->
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="image_selected"><img src="{{asset('storage/images/' . $food->image) }}" alt=""></div>
                    </div>

                    <!-- Description -->
                    <div class="col-lg-5 order-3">
                        <div class="product_description">
                            @if($food->category != null)
                            <div class="product_category"><a href="{{ route('client.category', $food->category->id) }}"> {{ $food->category->name }}</a></div>
                            @endif
                            <div class="product_name">{{ $food->name }}</div>
                            @if($food->restaurant != null)
                            <div class="product_category"><a href="{{ route('client.restaurant', $food->restaurant->id) }}">{{ $food->restaurant->name }}  </a></div>
                            @endif
                            <div class="product_category">
                                @foreach($tags as $tag)

                                    <button type="button" class="btn btn-outline-info"
                                            style="margin: 5px"><i class="bi bi-tag-fill" style="color: red"> </i><a style="color: #187caa" href="{{ route('client.tag', $tag->tag->id) }}">{{ $tag->tag->name }}</a></button>
                                @endforeach
                            </div>
                            <div class="product_name">{{ number_format($food->price_discount) }}đ</div>
                                <input type="hidden" class="form-control" name="food_id" value="{{$food->id}}" >
                                <input type="hidden" class="userId_{{$food->id}}" name="user_id" value="{{Session::get('user_id')}}" >
                                <button type="button" class="product_cart_button" id="addCart" data-id="{{$food->id}}">Thêm vào giỏ hàng</button>
                            <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                            <div class="product_text"><i class="bi bi-eye-fill" style="color:green"></i> Lượt xem: {{ $food->view_count }}</div>
                            @if(isset($food->restaurant->address))
                                <div class="product_text"><p><i class="bi bi-check-circle-fill" style="color:green"></i> Địa chỉ: {{ $food->restaurant->address }}</p></div>
                            @endif
                            <div class="product_text"><p><i class="bi bi-check-circle-fill" style="color:green"></i> Số lượng đã bán: {{ $food->sell_quantity }}</p></div>
                            @if(isset($food->coupon))
                            <div class="product_text"><p><i class="bi bi-check-circle-fill" style="color:green"></i> Mã giảm giá: {{ $food->coupon }}</p></div>
                            @endif
                            @if($food->count_coupon > 0)
                            <div class="product_text"><p><i class="bi bi-check-circle-fill" style="color:green"></i> Số lượng mã giảm giá: {{ $food->count_coupon }}</p></div>
                            @endif
                                <div class="product_text"><p><i class="bi bi-check-circle-fill" style="color:green"></i> Thời gian chuẩn bị: {{ $food->time_preparation }} phút</p></div>
                                <div class="product_text"><p><i class="far fa-clock" style="color:green"></i> Giờ mở cửa: {{ $food->restaurant->time_open }} - {{ $food->restaurant->time_close }}</p></div>
                            <div class="product_text"><p><i class="bi bi-check-circle-fill" style="color:green"></i> Ghi chú: {!! $food->description  !!} </p></div>
                        </div>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Quay lại</button>
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
    <script src="{{ asset('Client/js/product_custom.js') }}"></script>
    </body>

@endsection

