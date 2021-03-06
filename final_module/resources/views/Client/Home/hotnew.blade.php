<!-- Hot New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Giao nhanh</div>
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
                                    @if($fastDelivery->get($food)->restaurant != null)
                                    @if($fastDelivery->get($food)->restaurant->status == 2)
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            @if(asset($fastDelivery->get($food)->image))
                                                <a href="{{ route('client.food', $fastDelivery->get($food)->id) }}">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $fastDelivery->get($food)->image)}}" width="175px" alt=""></div>
                                                </a>
                                                    @endif
                                                <div class="product_content">
                                                @if ($fastDelivery->get($food)->price_discount > 0)
                                                <div class="product_price discount">{{ number_format($fastDelivery->get($food)->price_discount) }}đ
                                                    <span style="text-decoration: line-through black solid;">{{ number_format($fastDelivery->get($food)->price) }}đ</span>
                                                </div>
                                                @else
                                                <div class="product_price discount">{{ number_format($fastDelivery->get($food)->price) }}đ
                                                    <span></span>
                                                </div>
                                                @endif
                                                <div class="product_name"><div><a href="{{ route('client.food', $fastDelivery->get($food)->id) }}">
                                                            @if(strlen($fastDelivery->get($food)->name) >20)
                                                                {{ substr($fastDelivery->get($food)->name, 0, 20) }}...
                                                            @else
                                                                {{ $fastDelivery->get($food)->name }}
                                                            @endif</a></div></div>
                                                    <div class="char_subtitle">
                                                        @if(isset($fastDelivery->get($food)->restaurant->address))
                                                            @if(strlen($fastDelivery->get($food)->restaurant->address) >20)
                                                                {{ substr($fastDelivery->get($food)->restaurant->address, 0, 20) }}...
                                                            @else
                                                                {{ $fastDelivery->get($food)->restaurant->address }}
                                                            @endif
                                                        @endif
                                                    </div>
                                                @if(Session::has('user_id'))
                                                <div class="product_extras">
                                                <input type="hidden" class="form-control" name="food_id" value="{{$fastDelivery->get($food)->id}}" >
                                                <input type="hidden" class="userId_{{$fastDelivery->get($food)->id}}" name="user_id" value="{{Session::get('user_id')}}" >
                                                <button type="button" class="product_cart_button" id="addCart" data-id="{{$fastDelivery->get($food)->id}}">Thêm vào giỏ hàng</button>
                                               </div>
                                               @else
                                                    <div class="product_extras">
                                                        <button type="button" class="product_cart_button"><a href="{{route('client.login')}}">Thêm vào giỏ hàng</a></button>
                                                    </div>
                                                @endif
                                            </div>
                                            @if(Session::has('user_id'))
                                            <?php $flag = 0; ?>
                                            @foreach($like as $value)
                                                @if($value->food_id == $fastDelivery->get($food)->id)
                                                    <?php $flag =1  ?>
                                            <a href="" data-url="{{route('like',$fastDelivery->get($food)->id)}}" id="likee" >
                                                <div class="product_fav active"><i class="fas fa-heart "></i></div>
                                            </a>
                                                @endif
                                            @endforeach
                                            @if($flag == 0)
                                            <a href="" data-url="{{route('like',$fastDelivery->get($food)->id)}}" id="likee" >
                                                <div class="product_fav"><i class="fas fa-heart "></i></div>
                                            </a>
                                            @endif
                                        @else
                                            <a href="{{route('client.login')}}">
                                                <div class="product_fav"><i class="fas fa-heart "></i></div>
                                            </a>
                                        @endif
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-{{ intval((($fastDelivery->get($food)->price - $fastDelivery->get($food)->price_discount)) /
                                                                                                            $fastDelivery->get($food)->price * 100) }}%</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endfor
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel">
                                <div class="arrivals_slider slider">

                                    <!-- Slider Item -->
                                    @for($food = 3; $food < count($sell_quantity); $food ++)
                                    @if($sell_quantity->get($food)->restaurant != null)
                                    @if($sell_quantity->get($food)->restaurant->status == 2)
                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                @if(asset($sell_quantity->get($food)->image))
                                                    <a href="{{ route('client.food', $sell_quantity->get($food)->id) }}">
                                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('storage/images/'. $sell_quantity->get($food)->image)}}" width="175px" alt=""></div>
                                                    </a>
                                                        @endif
                                                <div class="product_content">
                                                @if ($sell_quantity->get($food)->price_discount > 0)
                                                <div class="product_price discount">{{ number_format($sell_quantity->get($food)->price_discount) }}đ
                                                    <span style="text-decoration: line-through black solid;">{{ number_format($sell_quantity->get($food)->price) }}đ</span>
                                                </div>
                                                @else
                                                <div class="product_price discount">{{ number_format($sell_quantity->get($food)->price) }}đ
                                                    <span></span>
                                                </div>
                                                @endif
                                                    <div class="product_name"><div><a href="{{ route('client.food', $sell_quantity->get($food)->id) }}">
                                                                @if(strlen($sell_quantity->get($food)->name) >20)
                                                                    {{ substr($sell_quantity->get($food)->name, 0, 20) }}...
                                                                @else
                                                                    {{ $sell_quantity->get($food)->name }}
                                                                @endif</a></div></div>
                                                    <div class="char_subtitle">
                                                        @if(isset($sell_quantity->get($food)->restaurant->address))
                                                            @if(strlen($sell_quantity->get($food)->restaurant->address) >20)
                                                                {{ substr($sell_quantity->get($food)->restaurant->address, 0, 20) }}...
                                                            @else
                                                                {{ $sell_quantity->get($food)->restaurant->address }}
                                                            @endif
                                                        @endif
                                                    </div>
                                                    @if(Session::has('user_id'))
                                                   <div class="product_extras">
                                                        <input type="hidden" class="form-control" name="food_id" value="{{$sell_quantity->get($food)->id}}" >
                                                        <input type="hidden" class="userId_{{$sell_quantity->get($food)->id}}" name="user_id" value="{{Session::get('user_id')}}" >
                                                        <button type="button" class="product_cart_button" id="addCart" data-id="{{$sell_quantity->get($food)->id}}">Thêm vào giỏ hàng</button>
                                                    </div>
                                                    @else
                                                        <div class="product_extras">
                                                            <button type="button" class="product_cart_button"><a href="{{route('client.login')}}">Thêm vào giỏ hàng</a></button>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if(Session::has('user_id'))
                                            <?php $flag = 0; ?>
                                            @foreach($like as $value)
                                                @if($value->food_id == $sell_quantity->get($food)->id)
                                                    <?php $flag =1  ?>
                                            <a href="" data-url="{{route('like',$sell_quantity->get($food)->id)}}" id="likee" >
                                                <div class="product_fav active"><i class="fas fa-heart "></i></div>
                                            </a>
                                                @endif
                                            @endforeach
                                            @if($flag == 0)
                                            <a href="" data-url="{{route('like',$sell_quantity->get($food)->id)}}" id="likee" >
                                                <div class="product_fav"><i class="fas fa-heart "></i></div>
                                            </a>
                                            @endif
                                        @else
                                            <a href="{{route('client.login')}}">
                                                <div class="product_fav"><i class="fas fa-heart "></i></div>
                                            </a>
                                        @endif
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">-{{ intval((($sell_quantity->get($food)->price - $sell_quantity->get($food)->price_discount)) /
                                                                                                            $sell_quantity->get($food)->price * 100) }}%</li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                        @endif
                                    @endfor
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                        </div>

                        <div class="col-lg-3">
                            <div class="arrivals_single clearfix">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    @if(asset($bestPrice->image))
                                        <a href="{{ route('client.food', $bestPrice->id) }}">
                                    <div class="arrivals_single_image"><img src="{{asset('storage/images/'. $bestPrice->image)}}" width="175px" alt=""></div>
                                        </a>
                                            @endif
                                        <div class="arrivals_single_content">
                                        <div class="arrivals_single_category"><a href="{{ route('client.category', $bestPrice->category->id) }}">{{ $bestPrice->category->name }}</a></div>
                                        <div class="arrivals_single_name_container clearfix">
                                            <div class="arrivals_single_name"><a href="{{ route('client.food', $bestPrice->id) }}">
                                                    @if(strlen($bestPrice->name) >20)
                                                        {{ substr($bestPrice->name, 0, 20) }}...
                                                    @else
                                                        {{ $bestPrice->name }}
                                                    @endif</a></div>

                                            <div class="product_price discount">{{ number_format($bestPrice->price_discount) }}đ<span>{{ number_format($bestPrice->price) }}đ</span></div>
                                        </div>
                                            <div class="char_subtitle">
                                                @if(isset($bestPrice->restaurant->address))
                                                    @if(strlen($bestPrice->restaurant->address) >20)
                                                        {{ substr($bestPrice->restaurant->address, 0, 20) }}...
                                                    @else
                                                        {{ $bestPrice->restaurant->address }}
                                                    @endif
                                                @endif
                                            </div>
                                       <input type="hidden" class="form-control" name="food_id" value="{{$bestPrice->id}}" >
                                        <input type="hidden" class="userId_{{$bestPrice->id}}" name="user_id" value="{{Session::get('user_id')}}" >
                                        <button type="button" class="arrivals_single_button" id="addCart" data-id="{{$bestPrice->id}}">Thêm vào giỏ hàng</button>
                                    </div>
                                    <div class="arrivals_single_fav product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="arrivals_single_marks product_marks">
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
