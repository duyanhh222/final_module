@extends('Client.Home.index')

@section('title', 'Trang chủ')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('Client/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/cart_responsive.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('Client/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/styles/product_responsive.css') }}">
<div class="super_container">
    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Giỏ hàng</div>
                        <div class="cart_items">
                            <form method="post"  action="{{route('update.cart')}}">
                                @csrf
                                
                            @foreach($carts as $cart)
                            <ul class="cart_list">

                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img src="{{asset('storage/images/' . $cart->food->image) }}" alt="" width="100px"></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Tên sản phẩm</div>
                                            <div class="cart_item_text">{{ $cart->food->name }}</div>
                                        </div>

                                        <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                            <input type="number" name="num[{{$cart->id}}]" id="quantity" class="form-control form-blue quantity" value="{{ $cart->quantity }}" min="1">
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Giá</div>
                                            @if($cart->food->price_discount == 0)
                                            <div class="cart_item_text">{{ number_format($cart->food->price) }}</div>
                                            @else
                                            <div class="cart_item_text">{{ number_format($cart->food->price_discount) }}</div>
                                            @endif
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <a href="{{route('delete.cart',$cart->id)}}">Xóa</a>

                                        </div>
                                       <div class="cart_item_total cart_info_col">
                                           <div class="cart_item_title">Tổng tiền</div>
                                           <div class="cart_item_text">{{ number_format($cart->total) }}</div>
                                       </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                                <div class="cart_buttons">
                                    <button type="submit" class="button cart_button_clear">Cập nhật giỏ hàng</button>
                                </div>
                            </form>
                        </div>

                        <!-- Order Total -->
                        
                        <div class="col-5">
                        <table class="table table-striped"> 
                            <?php $total = 0; ?>
                        @foreach($data as $key=>$value)
                            <tr class="food_row">
                                <td>Tổng hóa đơn của nhà hàng {{$name[$key]}}</td>
                                <?php $total += $value; ?>
                                <td>{{number_format($value)}}</td>
                            </tr>
                        @endforeach
                        </table>
                        </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">                             
                                <div class="order_total_title">                                                               
                                        Tổng hóa đơn:{{number_format($total)}}               
                                </div>
                                
                                <div class="order_total_amount"></div>
                            </div>
                        </div>
                    </div>
                    <div id="customer">
                        <form id="buy-now" method="post" action="{{route('bill.create')}}">
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
                                    <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" @if(old('name') != null ) value="{{old('name')}}" @else value="{{Session::get('user_name')}}" @endif class="form-control" required>
                                </div>
                                <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone"  @if(old('phone') != null ) value="{{old('phone')}}" @else value="{{Session::get('user_phone')}}" @endif class="form-control" required>
                                </div>
                                <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                                    <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="address"  @if(old('address') != null ) value="{{old('address')}}" @else value="{{Session::get('user_address')}}" @endif class="form-control" required>
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


    <script src="{{ asset('Client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Client/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('Client/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('Client/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('Client/js/cart_custom.js') }}"></script>




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
@endsection
