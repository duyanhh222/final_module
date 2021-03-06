@extends('Layout.Client.index')
@section('title','Food')
@section('main')


    <style>@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        body {
            background-color: #eeeeee;
            font-family: 'Open Sans', serif
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #ee5435;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }</style>
    <body oncontextmenu='return false' class='snippet-body'>
    <div class="col-md-12">
        <center><h2>Chi ti???t ????n h??ng</h2></center>
    </div>
    <div class="container">

        <article class="card">
            {{--            @if (Session::has('success'))--}}
            {{--                <p class="text-success">--}}
            {{--                    <i class="fa fa-check" aria-hidden="true"></i>--}}
            {{--                    {{ Session::get('success') }}--}}
            {{--                </p>--}}
            {{--            @endif--}}
            <header class="card-header"> ????n h??ng / Chi ti???t</header>
            <div class="card-body">
                <h6>M?? ????n h??ng: {{ $bill->id }}</h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"><strong>H??? t??n:</strong> <br>{{ $bill->user->user_name }} </div>
                        <div class="col"><strong>S??? ??i???n tho???i:</strong> <br><i
                                class="fa fa-phone"></i> {{ $bill->user->user_phone }} </div>
                        <div class="col"><strong>T??nh tr???ng:</strong> <br>
                            @if( $bill->status == 0 )
                                ???? h???y
                            @elseif( $bill->status == 1 )
                                Ch??a x??c nh???n
                            @elseif( $bill->status == 2 )
                                ???? x??c nh???n
                            @elseif( $bill->status == 3 )
                                ??ang chu???n b???
                            @elseif($bill->status == 4)
                                ??ang giao h??ng
                            @elseif( $bill->status == 5 )
                                Th??nh c??ng
                            @endif

                        </div>
                        <div class="col"><strong>?????a ch???:</strong> <br> {{ $bill->user->user_address }} </div>
                    </div>
                </article>
                <div class="track">
                    <div class="step



                        @if($bill->status == 2)
                        active
                        @elseif($bill->status == 3)
                        active
                        @elseif($bill->status == 4)
                        active
                        @elseif( $bill->status == 5 )
                        active
                        @endif
                        "><span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">???? x??c nh???n</span>
                    </div>
                    <div class="step


                        @if($bill->status == 3)
                        active
                        @elseif($bill->status == 4)
                        active
                         @elseif( $bill->status == 5 )
                        active
                        @endif
                        "><span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> ??ang chu???n b???</span>
                    </div>
                    <div class="step
                        @if($bill->status == 4)
                        active
                         @elseif( $bill->status == 5 )
                        active
                        @endif"><span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> ??ang giao h??ng </span>
                    </div>
                    {{--                    <div class="step--}}
                    {{--                        @if($bill->status == 4)--}}
                    {{--                        active--}}
                    {{--                         @elseif( $bill->status == 5 )--}}
                    {{--                        active--}}
                    {{--                        @endif"><span class="icon"> <i class="fa fa-box"></i> </span> <span--}}
                    {{--                            class="text">Ho??n th??nh</span></div>--}}
                    <div class="step  {{ $bill->status == 5?'active':'' }} "><span class="icon"> <i
                                class="fa fa-box"></i> </span> <span class="text">Ho??n th??nh</span></div>

                </div>
                <hr>
                <ul class="row">

                    @foreach($bill_detail_food as $food_bill)
                        <li class="col-md-4">
                            <figure class="itemside mb-3">
                                <div class="aside"><img
                                        src="{{ asset('storage/images/' .$food_bill->food->image) }}"
                                        class="img-sm bbill"></div>
                                <figcaption class="info align-self-center">
                                    <p class="title"><strong>{{ $food_bill->food->name }}</strong>
                                        <br> <span class="text-muted">{{ $food_bill->food->restaurant->name }}</span></p>
                                    @if($food_bill->food->price_discount == 0)
                                        <span class="text-muted">{{ number_format($food_bill->food->price) }}?? </span>
                                    @else
                                        <span class="text-muted">{{ number_format($food_bill->food->price_discount) }}?? </span>
                                    @endif
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
                <form action="{{ route('client.restaurant.update',$bill->id) }}" method="post">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="0"
                               id="flexRadioDefault1" {{ $bill->status == 0?'checked':'' }}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            ???? h???y
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="1"
                               id="flexRadioDefault1" {{ $bill->status == 1?'checked':'' }}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Ch??a x??c nh???n
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="2"
                               id="flexRadioDefault2" {{ $bill->status == 2?'checked':'' }}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            ???? x??c nh???n
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="3"
                               id="flexRadioDefault2" {{ $bill->status == 3?'checked':'' }}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            ??ang chu???n  b???
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="4"
                               id="flexRadioDefault2" {{ $bill->status == 4?'checked':'' }}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            ??ang giao h??ng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="5"
                               id="flexRadioDefault2" {{ $bill->status == 5?'checked':'' }}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Ho??n th??nh
                        </label>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary">C???p nh???t</button>

                </form>
                <button href="#" style="float: right" onclick="window.history.go(-1); return false;"
                        class="btn btn-warning" data-abc="true"><i class="fa fa-chevron-left"></i> Quay l???i
                </button>

            </div>
        </article>
    </div>
    <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
    </body>
@stop()

