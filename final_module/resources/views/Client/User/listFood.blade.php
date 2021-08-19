@extends('Layout.Client.index')
@section('title','Food')
@section('main')
<form action="" method="GET" class="form-inline search_form" >
    <div class="wrap">
        <div class="search">     
            <input class="searchTerm" name="key" id="" value="{{$key}}" placeholder="Tìm kiếm...">
            <button type="submit" class="searchButton"> <i class="fas fa-search"></i> </button>
        </div>
    </div>
</form>
<br>
<table class="table">
    <thead class="thead-primary">
    <tr>
        <th></th>
        <th>Ảnh</th>
        <th>Tên món ăn</th>
        <th style="text-align: center">Giá</th>
        <th style="text-align: center">Giá khuyến mãi</th>
        <th style="text-align: center">Lượt xem</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($foods as $key => $food)
        <tr>
            <td>{{ ++$key }}</td>
            <td><img src="{{asset('storage/images/'.$food->image)}}" width="100px" alt=""></td>
            <td>{{$food->name}}</td>
            <td style="text-align: center">{{number_format($food->price)}}</td>
            <td style="text-align: center">{{number_format($food->price_discount)}}</td>
            <td style="text-align: center">{{$food->view_count}}</td>
            <td>
                <a href="{{route('client.editFood',$food->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('client.destroyFood',$food->id)}}" class="btn btn-sm btn-danger btndelete" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
</table>
<div style="margin-top:20px">
    {{ $foods->appends(request()->all())->links() }}
</div>

@stop()

@section('css')
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('Table/css/style.css') }}">
@endsection