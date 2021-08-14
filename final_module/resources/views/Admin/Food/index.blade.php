@extends('Layout.Admin.index')
@section('main')
<table class="table table-hover">
    <thead>
        <tr>
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
            <td><img src="{{asset('storage/'.$food->image)}}" width="100px" alt=""></td>
            <td>{{$food->status}}</td>
            <td>{{$food->on_sale}}</td>
            <td>{{$food->user_id}}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop()