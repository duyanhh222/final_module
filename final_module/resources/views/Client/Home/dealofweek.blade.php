
<!-- Popular Categories -->

<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Danh mục</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                    <div class="popular_categories_link"><a href="#">tất cả danh mục</a></div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">

                        <!-- Popular Categories Item -->
                        @foreach($categories as $category)
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img src="{{asset('storage/images/'. $category->image)}}" alt=""></div>
                                <div class="popular_category_text"> <a href="{{ route('client.category', $category->id) }}">{{ $category->name }}</a></div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->

                <div class="deals">
                    <div class="deals_title">Tags</div>
                    <div class="deals_slider_container">
                        @foreach($tags as $tag)
                            <button type="button" class="btn btn-outline-info" style="margin: 5px"><i class="bi bi-tag-fill" style="color: red"> </i><a style="color: #187caa" href="{{ route('client.tag', $tag->id) }}">{{ $tag->name }}</a></button>

                    @endforeach
                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">

                            <!-- Deals Item -->
{{--                            @for($food = 0; $food < 3; $food ++)--}}
{{--                            <div class="owl-item deals_item">--}}
{{--                                @if(asset($mostView->get($food)->image))--}}
{{--                                <div class="deals_image"><img src="{{asset('storage/images/'. $mostView->get($food)->image)}}" alt=""></div>--}}
{{--                                @endif--}}
{{--                                    <div class="deals_content">--}}
{{--                                    <div class="deals_info_line d-flex flex-row justify-content-start">--}}
{{--                                        <div class="deals_item_category"><a href="#">{{ $mostView->get($food)->category->name }}</a></div>--}}
{{--                                        <div class="deals_item_price_a ml-auto">{{ number_format($mostView->get($food)->price) }}đ</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="deals_info_line d-flex flex-row justify-content-start">--}}
{{--                                        <div class="deals_item_name">{{ $mostView->get($food)->name }}</div>--}}
{{--                                        <div class="deals_item_price ml-auto">{{ number_format($mostView->get($food)->price_discount) }}đ</div>--}}
{{--                                    </div>--}}
{{--                                        <div class="char_subtitle">--}}
{{--                                            @if(isset($mostView->get($food)->restaurant->address))--}}
{{--                                                @if(strlen($mostView->get($food)->restaurant->address) >25)--}}
{{--                                                    {{ substr($mostView->get($food)->restaurant->address, 0, 25) }}...--}}
{{--                                                @else--}}
{{--                                                    {{ $mostView->get($food)->restaurant->address }}--}}
{{--                                                @endif--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    <div class="button banner_button"><a href="">Mua ngay</a></div>--}}
{{--                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">--}}
{{--                                        <div class="deals_timer_title_container">--}}
{{--                                            <div class="deals_timer_title">Nhanh tay</div>--}}
{{--                                            <div class="deals_timer_subtitle">Thời gian còn lại:</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="deals_timer_content ml-auto">--}}
{{--                                            <div class="deals_timer_box clearfix" data-target-time="">--}}
{{--                                                <div class="deals_timer_unit">--}}
{{--                                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>--}}
{{--                                                    <span>giờ</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="deals_timer_unit">--}}
{{--                                                    <div id="deals_timer1_min" class="deals_timer_min"></div>--}}
{{--                                                    <span>phút</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="deals_timer_unit">--}}
{{--                                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>--}}
{{--                                                    <span>giây</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endfor--}}



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
                                <li class="active">Ưu đãi</li>
                                <li>Đang sale</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">

                                <!-- Slider Item -->
                                @for($food = 0; $food < count($mostView); $food++)
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        @if(asset($mostView->get($food)->image))
                                            <a href="{{ route('client.food', $mostView->get($food)->id) }}">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $mostView->get($food)->image)}}" alt=""  width="175px"></div>
                                        @endif
                                            </a>
                                            <div class="product_content">
                                            <div class="product_price discount">{{ number_format($mostView->get($food)->price_discount) }}đ<span>{{ number_format($mostView->get($food)->price) }}đ</span></div>
                                            <div class="product_name"><div><a href="{{ route('client.food', $mostView->get($food)->id) }}">
                                                        @if(strlen($mostView->get($food)->name) >20)
                                                            {{ substr($mostView->get($food)->name, 0, 20) }}...
                                                        @else
                                                            {{ $mostView->get($food)->name }}
                                                        @endif
                                                        </a></div></div>
                                            <div class="char_subtitle">
                                                @if(isset($mostView->get($food)->restaurant->address))
                                                    @if(strlen($mostView->get($food)->restaurant->address) >20)
                                                        {{ substr($mostView->get($food)->restaurant->address, 0, 20) }}...
                                                    @else
                                                        {{ $mostView->get($food)->restaurant->address }}
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="product_extras">
                                                <form action="{{route('add.cart')}}" method="POST" role="form">
                                                    @csrf
                                                        <input type="hidden" class="form-control" name="food_id" value="{{$mostView->get($food)->id}}" >
                                                        <input type="hidden" class="form-control" name="user_id" value="{{Session::get('user_id')}}" >
                                                        <button type="submit" class="product_cart_button">Thêm vào giỏ hàng</button>
                                                </form>
                                            </div>
                                        </div>
                                        <?php
                                        $flag = 0;
                                        ?>
                                        @foreach($like as $value)
                                            @if($value->food_id == $mostView->get($food)->id)
                                                <?php $flag =1  ?>
                                        <a href="{{route('disslike',$mostView->get($food)->id)}}">
                                            <div class="product_fav active"><i class="fas fa-heart "></i></div>
                                        </a>  
                                            @endif
                                        @endforeach
                                        @if($flag == 0)
                                        <a href="{{route('like',$mostView->get($food)->id)}}">
                                            <div class="product_fav"><i class="fas fa-heart "></i></div>
                                        </a>  
                                        @endif
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
                                        @if(asset($onSale->get($food)->image))
                                            <a href="{{ route('client.food', $onSale->get($food)->id) }}">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $onSale->get($food)->image)}}"  width="175px" alt=""></div>
                                            </a>
                                                @endif
                                            <div class="product_content">
                                            <div class="product_price discount">{{ number_format($onSale->get($food)->price_discount) }}đ<span>{{ number_format($onSale->get($food)->price) }}đ</span></div>
                                            <div class="product_name"><div><a href="{{ route('client.food', $onSale->get($food)->id) }}">
                                                        @if(strlen($onSale->get($food)->name) >20)
                                                            {{ substr($onSale->get($food)->name, 0, 20) }}...
                                                        @else
                                                            {{ $onSale->get($food)->name }}
                                                        @endif
                                                        </a></div></div>
                                            <div class="char_subtitle">
                                                @if(isset($mostView->get($food)->restaurant->address))
                                                @if(strlen($onSale->get($food)->restaurant->address) >20)
                                                    {{ substr($onSale->get($food)->restaurant->address, 0, 20) }}...
                                                @else
                                                    {{ $onSale->get($food)->restaurant->address }}
                                                @endif
                                                @endif
                                            </div>
                                            <div class="product_extras">
                                                <form action="{{route('add.cart')}}" method="POST" role="form">
                                                    @csrf
                                                        <input type="hidden" class="form-control" name="food_id" value="{{$onSale->get($food)->id}}" >
                                                        <input type="hidden" class="form-control" name="user_id" value="{{Session::get('user_id')}}" >
                                                        <button type="submit" class="product_cart_button">Thêm vào giỏ hàng</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product_fav active"><i class="fas fa-heart "></i></div>
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


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
