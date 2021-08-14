<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->

                <div class="deals">
                    <div class="deals_title">Hot nhất trong tuần</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">

                            <!-- Deals Item -->
                            @for($food = 0; $food < 3; $food ++)
                            <div class="owl-item deals_item">
                                <div class="deals_image"><img src="{{asset('storage/images/'. $mostView->get($food)->image)}}" alt=""></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="#">{{ $mostView->get($food)->category->name }}</a></div>
                                        <div class="deals_item_price_a ml-auto">{{ number_format($mostView->get($food)->price) }}đ</div>
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name">{{ $mostView->get($food)->name }}</div>
                                        <div class="deals_item_price ml-auto">{{ number_format($mostView->get($food)->price_discount) }}đ</div>
                                    </div>
                                    <div class="button banner_button"><a href="">Mua ngay</a></div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Nhanh tay</div>
                                            <div class="deals_timer_subtitle">Thời gian còn lại:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                    <span>giờ</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                    <span>phút</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                    <span>giây</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor



                        </div>

                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Đặc biệt</li>
                                <li>Đang sale</li>
                                <li>Giao nhanh</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">

                                <!-- Slider Item -->
                                @for($food = 3; $food < count($mostView); $food++)
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $mostView->get($food)->image)}}" alt=""  width="175px"></div>
                                        <div class="product_content">
                                            <div class="product_price discount">{{ number_format($mostView->get($food)->price_discount) }}đ<span>{{ number_format($mostView->get($food)->price) }}đ</span></div>
                                            <div class="product_name"><div><a href="product.html">{{ $mostView->get($food)->name }}</a></div></div>
                                            <div class="char_subtitle">{{ $mostView->get($food)->restaurant->address }}</div>
                                            <div class="product_extras">
                                                <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{ intval((($mostView->get($food)->price - $mostView->get($food)->price_discount)) /
                                                                                                            $mostView->get($food)->price * 100) }}%</li>

                                        </ul>
                                    </div>
                                </div>
                                @endfor
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">

                                <!-- Slider Item -->
                                @for($food = 0; $food < count($onSale); $food ++)
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $onSale->get($food)->image)}}"  width="175px" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_price discount">{{ number_format($onSale->get($food)->price_discount) }}đ<span>{{ number_format($onSale->get($food)->price) }}đ</span></div>
                                            <div class="product_name"><div><a href="product.html">{{ $onSale->get($food)->name }}</a></div></div>
                                            <div class="product_extras">
                                                <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{ intval((($onSale->get($food)->price - $onSale->get($food)->price_discount)) /
                                                                                                            $onSale->get($food)->price * 100) }}%</li>
                                        </ul>
                                    </div>
                                </div>
                                @endfor
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">

                                <!-- Slider Item -->
                                @for($food = 0; $food < count($fastDelivery); $food ++)
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $fastDelivery->get($food)->image)}}" width="175px" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_price discount">{{ number_format($fastDelivery->get($food)->price_discount) }}đ<span>{{ number_format($fastDelivery->get($food)->price) }}đ</span></div>
                                            <div class="product_name"><div><a href="product.html">{{ $fastDelivery->get($food)->name }}</a></div></div>
                                            <div class="product_extras">

                                                <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{ intval((($fastDelivery->get($food)->price - $fastDelivery->get($food)->price_discount)) /
                                                                                                            $fastDelivery->get($food)->price * 100) }}%</li>

                                        </ul>
                                    </div>
                                </div>
                                @endfor
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Popular Categories -->

<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Popular Categories</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                    <div class="popular_categories_link"><a href="#">full catalog</a></div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">

                        <!-- Popular Categories Item -->
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img src="{{asset('Client/images/popular_1.png')}}" alt=""></div>
                                <div class="popular_category_text">Smartphones & Tablets</div>
                            </div>
                        </div>

                        <!-- Popular Categories Item -->
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img src="{{asset('Client/images/popular_2.png')}}" alt=""></div>
                                <div class="popular_category_text">Computers & Laptops</div>
                            </div>
                        </div>

                        <!-- Popular Categories Item -->
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img src="{{asset('Client/images/popular_3.png')}}" alt=""></div>
                                <div class="popular_category_text">Gadgets</div>
                            </div>
                        </div>

                        <!-- Popular Categories Item -->
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img src="{{asset('Client/images/popular_4.png')}}" alt=""></div>
                                <div class="popular_category_text">Video Games & Consoles</div>
                            </div>
                        </div>

                        <!-- Popular Categories Item -->
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img src="{{asset('Client/images/popular_5.png')}}" alt=""></div>
                                <div class="popular_category_text">Accessories</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
