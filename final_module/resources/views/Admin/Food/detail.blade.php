@extends('Layout.Admin.index')
@section('title','Chi tiết')
@section('css')
<style>
.head_food{
    margin-top: 10px;
    margin-bottom: 10px;
}
.image_food{
    max-height: 400px;
}
.image_food img{
    max-height: 400px;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>
@endsection
@section('main')
<div class="col-12 col-md-12">
    <div class="container">
        <div class="head_food">
            <h1> Chi tiết món ăn: {{ ucfirst($food_show->name) }}</h1>
        </div>
        
        <div class="image_food">
            <img src="{{ asset('storage/images/' .$food_show->image) }}" alt="">
        </div>
        <div class="col-12">
            <table class="table table-striped">  
                <tr class="food_row">
                    <td>Danh mục</td>
                    <td>{{ $food_show->category->name }}</td>
                </tr>
                <tr class="food_row">
                    <td>Đã bán</td>
                    <td>{{ $food_show->sell_quantity }}</td>
                </tr>
                <tr class="food_row">
                    <td>Giá bán</td>
                    <td>{{ number_format($food_show->price) }}đ</td>
                </tr>
                <tr class="food_row">
                    <td>Giá giảm</td>
                    <td>{{ number_format($food_show->price_discount) }}đ</td>
                </tr>
                <tr class="food_row">
                    <td>Ưu đãi</td>
                    <td>{{ $food_show->status== 0?'Không ':'Có' }}</td>
                </tr>
                <tr class="food_row">
                    <td>Đề cử</td>
                    <td>{{ $food_show->on_sale == 0?'Không ':'Có' }}</td>
                </tr>
                <tr class="food_row">
                    <td>Lượt xem</td>
                    <td>{{ $food_show->view_count }}</td>
                </tr>
                <tr class="food_row">
                    <td>Ghi chú</td>
                    <td>{!! $food_show->description !!}</td>
                </tr>
                <tr class="food_row">
                    <td>Thời gian chuẩn bị</td>
                    <td>{{$food_show->time_preparation}}</td>
                </tr>
                <tr class="food_row">
                    <td>Tên người dùng</td>
                    @if($food_show->user != null)
                    <td>{{$food_show->user->user_name}}</td>
                    @else
                    <td>Món ăn do admin tạo</td>
                    @endif
                </tr>
                <tr class="food_row">
                    <td>Tên nhà hàng</td>
                    @if($food_show->restaurant != null)
                    <td>{{$food_show->restaurant->name}}</td>
                    @else
                    <td>Món ăn ko rõ nhà hàng</td>
                    @endif
                </tr>
            </table>
            <div>
                <a class="btn btn-warning" href="{{route('food.edit', $food_show->id)}}">Sửa</a>
                <a class="btn btn-danger" href="{{route('food.destroy', $food_show->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                <a class="btn btn-dark" href="{{route('food.index')}}">Quay lại</a>
            </div>
        </div>
    </div>
</div>
@stop()
