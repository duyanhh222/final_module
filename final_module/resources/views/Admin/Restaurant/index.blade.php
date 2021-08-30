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
                 <td>
{{--                     {{$restaurant->user->user_name}}--}}
                 </td>
                    <td>{{$restaurant->phone}}</td>
                    <td>
                        @if($restaurant->status == 1)
                        Chờ xác nhận
                        @elseif($restaurant->status == 2)
                        Đã xác nhận
                        @elseif($restaurant->status == 0)
                            Tạm dừng
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
                            <a href="{{route('restaurant.dashboard', $restaurant->id)}}" style="margin-right:10px">
                            <i class="fas fa-file" style="transform:scale(2.0);"></i>
                            </a>
                            @if($restaurant->status != 0)
                            <a href="{{route('restaurant.disable',$restaurant->id)}}" class="btn btn-sm btn-danger btndelete" onclick="return confirm('Bạn muốn vô hiệu nhà này ko?')">
                                <i class="fas fa-trash"></i>
                            </a>
                            @elseif($restaurant->status == 0)
                            <a href="{{ route('restaurant.update', $restaurant->id) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endif



                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $restaurants->appends(request()->all())->links() }}
@endsection
