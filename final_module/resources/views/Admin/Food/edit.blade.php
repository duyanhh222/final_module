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
            @if($food->status == 0)
                <input type="checkbox" name="status" value="1">
            @else
            <input type="checkbox" name="status" value="1" checked="checked">
            @endif
            
            <label for="">
                Ưu đãi
            </label>
        </div>
        <div class="col-6 input_group">
         
        </div>
        <div class="col-6 input_group">
            @if($food->on_sale == 0)
                <input type="checkbox" name="on_sale" value="1">
            @else
            <input type="checkbox" name="on_sale" value="1" checked="checked">
            @endif
            
            <label for="">
                Đề cử
            </label>
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
        <label for="">Số lượng mã giảm giá</label>
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

        <div class="col-6 input_group">
            <label for="">Tags</label>
            <input type="text" name="tag" @if($tags_name != null) value="{{$tags_name}}" @endif class="form-control" id="" placeholder="">
        @error('tag')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>
    
    <div class="row g-3">
        <div class="col-6 input_group">
            <label for="">Nhà hàng</label>
            <select name="restaurant_id" id="input" class="form-control" required="required">
            <option value="">---Lựa chọn nhà hàng---</option>
                @foreach($restaurants as $restaurant)
                @if($restaurantId == $restaurant->id)
                <option value="{{$restaurant->id}}" selected>{{$restaurant->name}} </option>  
                @else
                <option value="{{$restaurant->id}}">{{$restaurant->name}} </option>  
                @endif
                @endforeach
            </select>
        @error('category_id')
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
