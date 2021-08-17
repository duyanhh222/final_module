@extends('Layout.Client.index')
@section('title','Food')
@section('main')
<form action="{{route('client.updateFood',$food->id)}}" method="POST" enctype="multipart/form-data" class="formcrud">
@csrf
<div>
    <div class="form_title">
        Thông tin món ăn
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">name</label>
        <input type="text" name="name" value="{{$food->name}}" class="form-control" id="" placeholder="Input field">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
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
    @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">price</label>
        <input type="text" name="price" value="{{$food->price}}" class="form-control" id="" placeholder="Input field">
    @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">price_discount</label>
        <input type="text" name="price_discount" value="{{$food->price_discount}}" class="form-control" id="" placeholder="Input field">
    @error('price_discount')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row">
        <div class="col-6 input_group">
            <label for="">image</label>
            <input type="file" name="file"  class="form-control" id="upload" placeholder="Input field">
            <input type="hidden" name="file_file" value="{{$food->image}}" >
        @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div>
        <img id="blah" src="{{asset('storage/images/'.$food->image)}}" width="150px" />
    </div>
    
    <div class="row">
        <div class="col-12">
        <label>Ghi chú</label>
        <textarea class="form-control" name="description" required>{{$food->description}}</textarea>
        </div>
    </div>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="row g-3">
        <div class="col-6 input_group">
            <label for="">coupon</label>
            <input type="text" name="coupon" value="{{$food->coupon}}" class="form-control" id="" placeholder="Input field">
            @error('coupon')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-6 input_group">
            <label for="">count_coupon</label>
            <input type="text" name="count_coupon" value="{{$food->count_coupon}}" class="form-control" id="" placeholder="Input field">
            @error('count_coupon')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row g-3">
        <div class="col-6 input_group">
            <label for="">time_preparation</label>
            <input type="text" name="time_preparation" value="{{$food->time_preparation}}" class="form-control" id="" placeholder="Input field">
            @error('time_preparation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-6 input_group">
            <label for="">ưu đãi</label>  
            <select name="status" id="" class="form-control">
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
    </div>
    
    <br>
    <div class="form_title">
        Thông tin nhà hàng
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Tên nhà hàng</label>
        <input type="text" name="restaurant_name" @if($restaurant != null) value="{{$restaurant->name}}" @endif class="form-control" id="" placeholder="Input field">
    @error('restaurant_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Địa chỉ nhà hàng</label>
        <input type="text" name="restaurant_address" @if($restaurant != null) value="{{$restaurant->address}}" @endif class="form-control" id="" placeholder="Input field">
    
    @error('restaurant_address')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">time_open</label>
        <input type="text" name="time_open" @if($restaurant != null) value="{{$restaurant->time_open}}" @endif class="form-control" id="" placeholder="Input field">
    @error('time_open')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">time_close</label>
        <input type="text" name="time_close" @if($restaurant != null) value="{{$restaurant->time_close}}" @endif class="form-control" id="" placeholder="Input field">
    @error('time_close')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">explain</label>
        <input type="text" name="explain" @if($restaurant != null) value="{{$restaurant->explain}}" @endif class="form-control" id="" placeholder="Input field">
    @error('explain')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">phone</label>
        <input type="text" name="phone" @if($restaurant != null) value="{{$restaurant->phone}}" @endif class="form-control" id="" placeholder="Input field">
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">service</label>
        <input type="text" name="service" @if($restaurant != null) value="{{$restaurant->service}}" @endif class="form-control" id="" placeholder="Input field">
    @error('service')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">tag</label>
        <input type="text" name="tag" @if($tags_name != null) value="{{$tags_name}}" @endif class="form-control" id="" placeholder="Input field">
    @error('tag')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

@stop()
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#upload").change(function() {
    readURL(this);
});
</script>
@stop()

@section('css')
<link rel="stylesheet" href="{{asset('Admin/plugins/summernote/summernote-bs4.min.css')}}">
<link rel="stylesheet" href="{{ asset('Form/css/form.css') }}">
@stop()
