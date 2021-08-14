@extends('Layout.Admin.index')
@section('main')
<form action="{{route('food.update',$food->id)}}" method="POST" enctype="multipart/form-data">
@csrf
    <legend>Form title</legend>

    <div class="form-group">
        <label for="">name</label>
        <input type="text" name="name" value="{{$food->name}}" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">category</label>
        <select name="category_id" id="input" class="form-control" required="required">
        <option value="">---Lựa chọn danh mục---</option>
            @foreach($data as $cat)
            @if($food->category_id == $cat->id)
            <option value="{{$cat->id}}" selected>{{$cat->name}} </option>  
            @endif
            @if($food->category_id != $cat->id)
            <option value="{{$cat->id}}" >{{$cat->name}} </option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">price</label>
        <input type="text" name="price" value="{{$food->price}}" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">price_discount</label>
        <input type="text" name="price_discount" value="{{$food->price_discount}}" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">image</label>
        <input type="file" name="file"  class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" id="summernote" cols="30" rows="10">{{$food->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="">món ăn ưu đãi</label>  
        <select name="status" id="">
            <option value="">--Lựa chọn trạng thái</option>
            @if($food->status == 0)
                <option value="1"  >Có</option>
                <option value="0" selected>Không </option>  
            @else
                <option value="1" selected >Có</option>
                <option value="0" >Không </option>  
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="">món ăn đề cử</label>  
        <select name="on_sale" id="">
            <option value="">--Lựa chọn trạng thái</option>
            @if($food->on_sale == 0)
                <option value="1"  >Có</option>
                <option value="0" selected>Không </option>  
            @else
                <option value="1" selected >Có</option>
                <option value="0" >Không </option>  
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="">coupon</label>
        <input type="text" name="coupon" value="{{$food->coupon}}" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">count_coupon</label>
        <input type="text" name="count_coupon" value="{{$food->count_coupon}}" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">time_preparation</label>
        <input type="text" name="time_preparation" value="{{$food->time_preparation}}" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Tên nhà hàng</label>
        <input type="text" name="restaurant_name" @if($restaurant != null) value="{{$restaurant->name}}" @endif class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Địa chỉ nhà hàng</label>
        <input type="text" name="restaurant_address" @if($restaurant != null) value="{{$restaurant->address}}" @endif class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">time_open</label>
        <input type="text" name="time_open" @if($restaurant != null) value="{{$restaurant->time_open}}" @endif class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">time_close</label>
        <input type="text" name="time_close" @if($restaurant != null) value="{{$restaurant->time_close}}" @endif class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">explain</label>
        <input type="text" name="explain" @if($restaurant != null) value="{{$restaurant->explain}}" @endif class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">phone</label>
        <input type="text" name="phone" @if($restaurant != null) value="{{$restaurant->phone}}" @endif class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">service</label>
        <input type="text" name="service" @if($restaurant != null) value="{{$restaurant->service}}" @endif class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">tag</label>
        <input type="text" name="tag" @if($tags_name != null) value="{{$tags_name}}" @endif class="form-control" id="" placeholder="Input field">
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()
@section('js')
<script src="{{asset('Admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>
@stop()

@section('css')
<link rel="stylesheet" href="{{asset('Admin/plugins/summernote/summernote-bs4.min.css')}}">
@stop()
