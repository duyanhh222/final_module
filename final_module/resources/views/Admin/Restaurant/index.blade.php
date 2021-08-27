@extends('Layout.Admin.index')
@section('title','Nhà hàng')
@section('main')

    <div class="row">
        <div class="col-6">
            <h3>Danh sách nhà hàng</h3>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên nhà hàng</th>
                <th>Người đăng ký</th>
                <th>Số điện thoại</th>
                <th>Tình trạng</th>
                <th>Địa chỉ</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($restaurants as $restaurant)
                <tr>
                    <td>{{$restaurant->id}}</td>
                    <td>{{$restaurant->name}}</td>
                    <td></td>
{{--                    <td>{{$restaurant->user->user_name}}</td>--}}
                    <td>{{$restaurant->phone}}</td>
                    <td>
                        @if($restaurant->status == 1)
                        Chờ xác nhận
                        @elseif($restaurant->status == 2)
                        Đã xác nhận

                        @endif
                    </td>
                    <td>
                        @if(strlen($restaurant->address) > 50)
                        {{substr($restaurant->address,50)}}...
                        @else
                        {{$restaurant->address}}
                        @endif
                    </td>
                    <td>

                            <a href="" class="btn btn-sm btn-danger btndelete" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                <i class="fas fa-trash"></i>
                            </a>



                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $restaurants->appends(request()->all())->links() }}
@endsection
