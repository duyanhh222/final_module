@extends('Layout.Client.index')
@section('title','Food')
@section('main')

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Mã hóa đơn</th>
                <th>Tên khách hàng</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
                <th>Tình trạng</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($bills as $bill)
                <tr>
                    <td>TNAG{{$bill->id}}</td>
                    <td>{{$bill->user->user_name}}</td>
                    <td>{{number_format($bill->total)}} đ</td>
                    <td>{{$bill->created_at}}</td>
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
                    <td>
                        <a href="{{ route('client.restaurant.detail', $bill->id) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $bills->appends(request()->all())->links() }}
@stop()


