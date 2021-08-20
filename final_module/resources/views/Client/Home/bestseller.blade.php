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
                                        <a href="{{ route('client.food', $mostNew->get($food)->id) }}">
                                    <div class="bestsellers_image"><img src="{{asset('storage/images/'. $mostNew->get($food)->image)}}" width="175px" alt=""></div>
                                        </a>
                                            @endif
                                        <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="{{ route('client.category', $mostNew->get($food)->category->id) }}">{{ $mostNew->get($food)->category->name }}</a></div>
                                        <div class="bestsellers_name"><a href="{{ route('client.food', $mostNew->get($food)->id) }}">
                                                @if(strlen($mostNew->get($food)->name) >20)
                                                    {{ substr($mostNew->get($food)->name, 0, 20) }}...
                                                @else
                                                    {{ $mostNew->get($food)->name }}
                                                @endif</a></div>
                                            <div class="char_subtitle">
                                                @if(isset($mostNew->get($food)->restaurant->address))
                                                    @if(strlen($mostNew->get($food)->restaurant->address) >20)
                                                        {{ substr($mostNew->get($food)->restaurant->address, 0, 20) }}...
                                                    @else
                                                        {{ $mostNew->get($food)->restaurant->address }}
                                                    @endif
                                                @endif
                                            </div>


                                            <div class="bestsellers_price discount">{{ number_format($mostNew->get($food)->price_discount) }}đ<span>{{ number_format($mostNew->get($food)->price) }}đ</span></div>
                                            @if(Session::has('user_id'))
                                            <div class="product_extras">
                                            <input type="hidden" class="form-control" name="food_id" value="{{$mostNew->get($food)->id}}" >
                                            <input type="hidden" class="userId_{{$mostNew->get($food)->id}}" name="user_id" value="{{Session::get('user_id')}}" >
                                            <button type="button" class="product_cart_button" id="addCart" data-id="{{$mostNew->get($food)->id}}">Thêm vào giỏ hàng</button>
                                            </div>
                                            @else
                                                <div class="product_extras">
                                                    <button type="button" class="product_cart_button"><a href="{{route('client.login')}}">Thêm vào giỏ hàng</a></button>
                                                </div>
                                            @endif
                                        </div>
                                </div>
                                @if(Session::has('user_id'))
                                            <?php $flag = 0; ?>                                       
                                            @foreach($like as $value)
                                                @if($value->food_id == $mostNew->get($food)->id)
                                                    <?php $flag =1  ?>
                                            <a href="" data-url="{{route('like',$mostNew->get($food)->id)}}" id="likee" >
                                                <div class="product_fav active"><i class="fas fa-heart "></i></div>
                                            </a>  
                                                @endif
                                            @endforeach
                                            @if($flag == 0)
                                            <a href="" data-url="{{route('like',$mostNew->get($food)->id)}}" id="likee" >
                                                <div class="product_fav"><i class="fas fa-heart "></i></div>
                                            </a>  
                                            @endif
                                        @else
                                            <a href="{{route('client.login')}}">
                                                <div class="product_fav"><i class="fas fa-heart "></i></div>
                                            </a>  
                                        @endif
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-{{ intval((($mostNew->get($food)->price - $mostNew->get($food)->price_discount)) /
                                                                                                            $fastDelivery->get($food)->price * 100) }}%</li>
                                </ul>
                            </div>
                            @endfor
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
