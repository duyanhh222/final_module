<!-- Best Sellers -->

<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Món mới nhất</div>
                        <ul class="clearfix">
                            <li class="active">Top 20</li>
                            <li>Audio & Video</li>
                            <li>Laptops & Computers</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>

                    <div class="bestsellers_panel panel active">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            @for($food = 3; $food < count($mostNew); $food ++)
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    @if(asset($mostNew->get($food)->image))
                                    <div class="bestsellers_image"><img src="{{asset('storage/images/'. $mostNew->get($food)->image)}}" width="175px" alt=""></div>
                                    @endif
                                        <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">
                                                @if(strlen($mostNew->get($food)->name) >20)
                                                    {{ substr($mostNew->get($food)->name, 0, 20) }}...
                                                @else
                                                    {{ $mostNew->get($food)->name }}
                                                @endif</a></div>
                                            <div class="char_subtitle">
                                                @if(isset($mostView->get($food)->restaurant->address))
                                                    @if(strlen($mostNew->get($food)->restaurant->address) >20)
                                                        {{ substr($mostNew->get($food)->restaurant->address, 0, 20) }}...
                                                    @else
                                                        {{ $mostNew->get($food)->restaurant->address }}
                                                    @endif
                                                @endif
                                            </div>


                                            <div class="bestsellers_price discount">{{ number_format($mostNew->get($food)->price_discount) }}đ<span>{{ number_format($mostNew->get($food)->price) }}đ</span></div>
                                            <div class="product_extras">
                                                <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-{{ intval((($mostNew->get($food)->price - $mostNew->get($food)->price_discount)) /
                                                                                                            $fastDelivery->get($food)->price * 100) }}%</li>
                                </ul>
                            </div>
                            @endfor
                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('Client/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
