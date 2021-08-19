<!-- Banner -->
{{--<div class="container fill_height">--}}
{{--    <div class="row fill_height">--}}
{{--        <div class="banner_product_image"><img src="{{asset('Client/images/banner1.png')}}" alt=""></div>--}}
{{--        <div class="col-lg-5 offset-lg-4 fill_height">--}}
{{--            <div class="banner_content">--}}
{{--                <h1 class="banner_text">new era of smartphones</h1>--}}
{{--                <div class="banner_price"><span>$530</span>$460</div>--}}
{{--                <div class="banner_product_name">Apple Iphone 6s</div>--}}
{{--                <div class="button banner_button"><a href="#">Shop Now</a></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="container_banner">
<div class="banner">
    <div class="banner_background" style="background-image:url(Client/images/banner_background.jpg)"></div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="width: 1800px">
                <img src="{{asset('Client/images/banner1.png')}}" class="d-block w-100"  style="width:30%!important; height: 300px; margin-left:20%;" alt="...">
            </div>
            <div class="carousel-item" style="width: 1800px">
                <img src="{{asset('Client/images/banner2.png')}}" class="d-block w-100"  style="width:30%!important; height: 300px; margin-left:20%;"  alt="...">
            </div>
            <div class="carousel-item" style="width: 1800px">
                <img src="{{asset('Client/images/banner3.png')}}" class="d-block w-100"  style="width:30%!important; height: 300px; margin-left:20%;"  alt="...">
            </div>
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
</div>

<!-- Characteristics -->

<div class="characteristics">
    <div class="container">
        <div class="row">

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('Client/images/char_1.png')}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Miễn phí giao hàng</div>
                        <div class="char_subtitle">từ 100k</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('Client/images/char_2.png')}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Đổi trả</div>
                        <div class="char_subtitle">khi có lỗi</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('Client/images/char_3.png')}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Tiết kiệm</div>
                        <div class="char_subtitle">thời gian tiền bạc</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('Client/images/char_4.png')}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Chính hãng</div>
                        <div class="char_subtitle">nhập khẩu sạch sẽ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
