@extends('Layout.Admin.index')
@section('title','Food')
@section('main')
<form action="" method="GET" class="form-inline" >
    <div class="form-group">     
        <input class="form-control" name="key" id="" value="{{$key}}" placeholder="Search...">
    </div>
    <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> </button>
</form>

<table class="table">
    <thead class="thead-primary">
    <tr>
        <th>#</th>
        <th>Tên món ăn</th>
        <th>Giá</th>
        <th>Giá khuyến mãi</th>
        <th>Ảnh</th>
        <th>Trạng thái</th>
        <th>On_sale</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($foods as $key => $food)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{$food->name}}</td>
            <td>{{$food->price}}</td>
            <td>{{$food->price_discount}}</td>
            <td><img src="{{asset('storage/images/'.$food->image)}}" width="100px" alt=""></td>
            <td>{{$food->status}}</td>
            <td>{{$food->on_sale}}</td>
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
</table>
{{ $foods->appends(request()->all())->links() }}
@stop()

@section('css')
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('Table/css/style.css') }}">
@endsection