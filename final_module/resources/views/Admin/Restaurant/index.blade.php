@extends('Layout.Admin.index')
@section('title','Category')
@section('main')

    <div class="row">
        <div class="col-6">
            <h3>Danh sách danh mục</h3>
        </div>
        <div class="col-6">
            <div style="float:right">
                <a href="{{route('category.create')}}" class="btn btn-primary">Thêm mới</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên nhà hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($restaurants as $restaurant)
                <tr>
                    <td>{{$restaurant->id}}</td>
                    <td>{{$restaurant->name}}</td>
                    <td><img src="{{asset('storage/images/'.$restaurant->image)}}" width="100px" alt=""></td>
                    <td>{{$restaurant->amount}}</td>
                    <td>
                        <a href="{{route('category.edit',$restaurant->id)}}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('category.destroy',$restaurant->id)}}" class="btn btn-sm btn-danger btndelete" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
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
