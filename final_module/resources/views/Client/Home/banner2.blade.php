<!-- Banner -->

<div class="banner_2">
    <div class="banner_2_background" style="background-image:url(Client/images/banner_2_background.jpg)"></div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <!-- Banner 2 Slider -->

        <div class="owl-carousel owl-theme banner_2_slider">

            <!-- Banner 2 Slider Item -->
            @for($food = 0; $food < 3; $food ++)
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">{{ $sell_quantity->get($food)->category->name }}</div>
                                    <div class="banner_2_title">{{ $sell_quantity->get($food)->name }}</div>
                                    <div class="banner_2_text">{!! $sell_quantity->get($food)->description !!}</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                    <div class="button banner_2_button"><a href="#">Thêm vào giỏ hàng</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img src="{{asset('storage/images/'. $sell_quantity->get($food)->image)}}" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor


        </div>
    </div>
</div>
