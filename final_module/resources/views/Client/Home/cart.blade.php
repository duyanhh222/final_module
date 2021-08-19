@extends('client.Home.index')

@section('title', 'Trang chủ')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('client/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/cart_responsive.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('client/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/styles/product_responsive.css') }}">
<div class="super_container">
    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Giỏ hàng</div>
                        <div class="cart_items">
                            <form method="post"  action="">
                                @csrf
                                <!-- @if(!empty(session()->get('cart')))
                            @foreach($products as $product) -->
                            <ul class="cart_list">

                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img src="{{asset('storage/images/' . $product->prd_image) }}" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Tên sản phẩm</div>
                                            <!-- <div class="cart_item_text">{{ $product->prd_name }}</div> -->
                                        </div>

                                        <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                            <input type="number" name="quantity[{{ $product->prd_id }}]" id="quantity" class="form-control form-blue quantity" value="{{ $cart[$product->prd_id] }}" min="1">
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Giá</div>
                                            <!-- <div class="cart_item_text">{{ number_format($product->prd_price_discount) }}</div> -->
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <a href="{{route('cart.delete',['id' => $product->prd_id])}}">Xóa</a>

                                        </div>
{{--                                        <div class="cart_item_total cart_info_col">--}}
{{--                                            <div class="cart_item_title">Tổng tiền</div>--}}
{{--                                            <div class="cart_item_text">$2000</div>--}}
{{--                                        </div>--}}
                                    </div>
                                </li>
                            </ul>
                            <!-- @endforeach
                                @endif -->
                                <div class="cart_buttons">
                                    <button type="submit" class="button cart_button_clear">Cập nhật giỏ hàng</button>
                                </div>
                            </form>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Tổng hóa đơn:</div>
                                <div class="order_total_amount"></div>
                            </div>
                        </div>
                    </div>
                    <div id="customer">
                        <form id="buy-now" method="post" action="">
                            @csrf
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <div class="col-12">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li><i class="bi bi-x-circle-fill" style="color:red"></i> {{ $error }}</li><br>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <div class="row">


                                <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Họ và tên (bắt buộc)" type="text" name="customer_name" value="{{old('name')}}" class="form-control" required>
                                </div>
                                <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Số điện thoại (bắt buộc)" type="text" name="customer_phone" value="{{old('phone')}}" class="form-control" required>
                                </div>
                                <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                                    <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="address" value="{{old('add')}}" class="form-control" required>
                                </div>
                                <div class="cart_buttons">
                                    <button type="submit" class="button cart_button_checkout">Đặt hàng</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </div>


    <script src="{{ asset('client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('client/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('client/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('client/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('client/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('client/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('client/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('client/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('client/js/cart_custom.js') }}"></script>




    <script src="{{ asset('client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('client/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('client/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('client/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('client/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('client/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('client/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('client/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('client/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('client/js/product_custom.js') }}"></script>
@endsection
