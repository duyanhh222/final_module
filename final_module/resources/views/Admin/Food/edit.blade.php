@extends('Layout.Admin.index')
@section('title','Food')
@section('main')
<form action="{{route('food.update',$food->id)}}" method="POST" enctype="multipart/form-data" class="formcrud">
@csrf
<div>
    <div class="form_title">
        Thông tin món ăn
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Tên món ăn</label>
        <input type="text" name="name" value="{{$food->name}}" class="form-control" id="" placeholder="">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Danh mục</label>
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
        <label for="">Giá</label>
        <input type="text" name="price" value="{{$food->price}}" class="form-control" id="" placeholder="">
    @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Giá khuyến mại</label>
        <input type="text" name="price_discount" value="{{$food->price_discount}}" class="form-control" id="" placeholder="">
    @error('price_discount')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row">
        <div class="col-6 input_group">
            <label class="custom-file-upload">
                <i class="fas fa-images fa-4x"></i>
                <input type="file" name="file"  class="form-control" id="upload" placeholder="">
                <input type="hidden" name="file_file" value="{{$food->image}}" >
            </label>
            
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
        <label for="">Ưu đãi</label>  
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
    <div class="col-6 input_group">
        <label for="">Đề cử</label>  
        <select name="on_sale" id="" class="form-control"> 
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
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Mã giảm giá</label>
        <input type="text" name="coupon" value="{{$food->coupon}}" class="form-control" id="" placeholder="">
    @error('coupon')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Đề cử</label>
        <input type="text" name="count_coupon" value="{{$food->count_coupon}}" class="form-control" id="" placeholder="">
    @error('count_coupon')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row">
        <div class="col-6 input_group">
        <label for="">Thời gian chuẩn bị</label>
        <input type="text" name="time_preparation" value="{{$food->time_preparation}}" class="form-control" id="" placeholder="">
    @error('time_preparation')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    
    <br>
    <div class="form_title">
        Thông tin nhà hàng
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Tên nhà hàng</label>
        <input type="text" name="restaurant_name" @if($restaurant != null) value="{{$restaurant->name}}" @endif class="form-control" id="" placeholder="">
    @error('restaurant_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Địa chỉ nhà hàng</label>
        <input type="text" name="restaurant_address" @if($restaurant != null) value="{{$restaurant->address}}" @endif class="form-control" id="" placeholder="">
    
    @error('restaurant_address')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Thời gian mở cửa</label>
        <input type="text" name="time_open" @if($restaurant != null) value="{{$restaurant->time_open}}" @endif class="form-control" id="" placeholder="">
    @error('time_open')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Thời gian đóng cửa</label>
        <input type="text" name="time_close" @if($restaurant != null) value="{{$restaurant->time_close}}" @endif class="form-control" id="" placeholder="">
    @error('time_close')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Giải thích phí dịch vụ</label>
        <input type="text" name="explain" @if($restaurant != null) value="{{$restaurant->explain}}" @endif class="form-control" id="" placeholder="">
    @error('explain')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Số điện thoại</label>
        <input type="text" name="phone" @if($restaurant != null) value="{{$restaurant->phone}}" @endif class="form-control" id="" placeholder="">
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Phí dịch vụ</label>
        <input type="text" name="service" @if($restaurant != null) value="{{$restaurant->service}}" @endif class="form-control" id="" placeholder="">
    @error('service')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Tags</label>
        <input type="text" name="tag" @if($tags_name != null) value="{{$tags_name}}" @endif class="form-control" id="" placeholder="">
    @error('tag')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a class="btn btn-dark" href="{{route('food.index')}}">Quay lại</a>
    </div>
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
