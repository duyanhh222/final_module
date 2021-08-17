@extends('Layout.Admin.index')
@section('title','Food')
@section('main')
<form action="" method="GET" class="form-inline" >
    <div class="form-group">
        <input class="form-control" name="key" id="" value="{{$key}}" placeholder="Search...">
    </div>
    <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> </button>
</form>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên món</th>
            <th>Giá</th>
            <th>Giá khuyến mại</th>
            <th>Ảnh</th>
            <th>Đề cử</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($foods as $food)
        <tr>
            <td>{{$food->id}}</td>
            <td>{{$food->name}}</td>
            <td>{{$food->price}}</td>
            <td>{{$food->price_discount}}</td>
            <td><img src="{{asset('storage/images/'.$food->image)}}" width="100px" alt=""></td>
            <td>{{$food->on_sale == 0?'Không':'Có'}}</td>
            <td>
                <a href="{{route('food.show',$food->id)}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-file"></i>
                </a>
                <a href="{{route('food.edit',$food->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('food.destroy',$food->id)}}" class="btn btn-sm btn-danger btndelete" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $foods->appends(request()->all())->links() }}
@stop()
