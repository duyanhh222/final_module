@extends('Client.Home.index')

@section('title', 'Đơn hàng của tôi')
@section('content')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('Bill/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('Bill/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('Bill/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('Bill/css/style.css')}}">

    <title>Table #6</title>



    <div class="content">

        <div class="container">
            <h2 class="mb-5">Đơn hàng của tôi</h2>


            <div class="table-responsive">

                <table class="table table-striped custom-table">
                    <thead>
                    <tr>

                        <th scope="col">Mã đơn</th>
                        <th scope="col">Tên nhà hàng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bills as $bill)
                    <tr >
                        <td>
                            TNAG{{mt_rand(1000,10000) }}
                        </td>

                        <td><a href="#">{{$bill->restaurant->name}}</a></td>
                        <td>
                            {{ number_format($bill->total) }}đ
{{--                            <small class="d-block">Far far away, behind the word mountains</small>--}}
                        </td>
                        <td>
                            @if( $bill->status == 0 )
                                Đã hủy
                            @elseif( $bill->status == 1 )
                                Chưa xác nhận
                            @elseif( $bill->status == 2 )
                                Đã xác nhận
                            @elseif( $bill->status == 3 )
                                Đang chuẩn bị
                            @elseif($bill->status == 4)
                                Đang giao hàng
                            @elseif( $bill->status == 5 )
                                Thành công
                            @endif
                        </td>
                        <td>{{ $bill->created_at }}</td>
                        <td><a href="{{ route('client.bill.detail', $bill->id) }}" class="more">Chi tiết</a></td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>



    <script src="{{ asset('Bill/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('Bill/js/popper.min.js')}}"></script>
    <script src="{{ asset('Bill/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('Bill/js/main.js')}}"></script>
@endsection
