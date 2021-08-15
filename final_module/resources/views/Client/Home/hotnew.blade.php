<!-- Hot New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Hot New Arrivals</div>
                        <ul class="clearfix">
                            <li class="active">Giao nhanh</li>
                            <li>Bán chạy</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9" style="z-index:1;">

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">

                                    <!-- Slider Item -->
                                    @for($food = 0; $food < count($fastDelivery); $food ++)
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            @if(asset($fastDelivery->get($food)->image))
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $fastDelivery->get($food)->image)}}" width="175px" alt=""></div>
                                            @endif
                                                <div class="product_content">
                                                    <div class="product_price discount">{{ number_format($fastDelivery->get($food)->price_discount) }}đ<span>{{ number_format($fastDelivery->get($food)->price) }}đ</span></div>
                                                <div class="product_name"><div><a href="product.html">
                                                            @if(strlen($fastDelivery->get($food)->name) >20)
                                                                {{ substr($fastDelivery->get($food)->name, 0, 20) }}...
                                                            @else
                                                                {{ $fastDelivery->get($food)->name }}
                                                            @endif</a></div></div>
                                                    <div class="char_subtitle">
                                                        @if(isset($mostView->get($food)->restaurant->address))
                                                            @if(strlen($fastDelivery->get($food)->restaurant->address) >20)
                                                                {{ substr($fastDelivery->get($food)->restaurant->address, 0, 20) }}...
                                                            @else
                                                                {{ $fastDelivery->get($food)->restaurant->address }}
                                                            @endif
                                                        @endif
                                                    </div>
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
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel">
                                <div class="arrivals_slider slider">

                                    <!-- Slider Item -->
                                    @for($food = 3; $food < count($sell_quantity); $food ++)
                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                @if(asset($sell_quantity->get($food)->image))
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $sell_quantity->get($food)->image)}}" width="175px" alt=""></div>
                                                @endif
                                                <div class="product_content">
                                                    <div class="product_price discount">{{ number_format($sell_quantity->get($food)->price_discount) }}đ<span>{{ number_format($sell_quantity->get($food)->price) }}đ</span></div>
                                                    <div class="product_name"><div><a href="product.html">
                                                                @if(strlen($sell_quantity->get($food)->name) >20)
                                                                    {{ substr($sell_quantity->get($food)->name, 0, 20) }}...
                                                                @else
                                                                    {{ $sell_quantity->get($food)->name }}
                                                                @endif</a></div></div>
                                                    <div class="char_subtitle">
                                                        @if(isset($mostView->get($food)->restaurant->address))
                                                            @if(strlen($sell_quantity->get($food)->restaurant->address) >20)
                                                                {{ substr($sell_quantity->get($food)->restaurant->address, 0, 20) }}...
                                                            @else
                                                                {{ $sell_quantity->get($food)->restaurant->address }}
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="product_extras">
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">-{{ intval((($sell_quantity->get($food)->price - $sell_quantity->get($food)->price_discount)) /
                                                                                                            $fastDelivery->get($food)->price * 100) }}%</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                        </div>

                        <div class="col-lg-3">
                            <div class="arrivals_single clearfix">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <div class="arrivals_single_image"><img src="{{asset('Client/images/new_single.png')}}" alt=""></div>
                                    <div class="arrivals_single_content">
                                        <div class="arrivals_single_category"><a href="#">Smartphones</a></div>
                                        <div class="arrivals_single_name_container clearfix">
                                            <div class="arrivals_single_name"><a href="#">LUNA Smartphone</a></div>
                                            <div class="arrivals_single_price text-right">$379</div>
                                        </div>
                                        <div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <form action="#"><button class="arrivals_single_button">Add to Cart</button></form>
                                    </div>
                                    <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="arrivals_single_marks product_marks">
                                        <li class="arrivals_single_mark product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
