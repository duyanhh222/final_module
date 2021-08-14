@extends('Layout.Admin.index')
@section('main')
<table class="table table-hover">
    <thead>
        <tr>
        'name','category_name','restaurant_id','price','price_discount','image','description','status','on_sale',
        'user_id','coupon','count_coupon','time_preparation'
            <th>#</th>
            <th>name</th>
            <th>category_name</th>
            <th>price</th>
            <th>price_discount</th>
            <th>image</th>
            <th>status</th>
            <th>on_sale</th>
            <th>user_id</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($foods as $food)
        <tr>
            <td>{{$food->id}}</td>
            <td>{{$food->name}}</td>
            <td>{{$food->category_id}}</td>
            <td>{{$food->price}}</td>
            <td>{{$food->price_discount}}</td>
            <td>{{$food->image}}</td>
            <td>{{$food->status}}</td>
            <td>{{$food->on_sale}}</td>
            <td>{{$food->user_id}}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop()