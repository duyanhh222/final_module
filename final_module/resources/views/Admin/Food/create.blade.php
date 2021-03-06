@extends('Layout.Admin.index')
@section('title','Food')
@section('main')
<form action="{{route('food.store')}}" method="POST" enctype="multipart/form-data" class="formcrud">
@csrf
<div>
    <div class="form_title">
        Thông tin món ăn
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Tên món</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="" placeholder="Nhập tên món">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Danh mục</label>
        <select name="category_id" id="input" class="form-control" required="required">
            <option value="" disabled selected>Chọn danh mục</option>
            @foreach($data as $cat)
            @if(old('category_id') == $cat->id)
            <option value="{{$cat->id}}" selected>{{$cat->name}} </option>
            @endif
            @if(old('category_id') != $cat->id)
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
        <input type="text" name="price" value="{{old('price')}}" class="form-control" id="" placeholder="Nhập giá">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Giá khuyến mại</label>
        <input type="text" name="price_discount" value="{{old('price_discount')}}" class="form-control" id="" placeholder="Nhập giá khuyến mại">
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
        </label>
        @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>
    
    <div>
        <img id="blah" src="" width="150px" />
    </div>
    <div class="row">
        <div class="col-12">
        <label>Ghi chú</label>
        <textarea class="form-control" name="description" required>{{old('description')}}</textarea>
        </div>
    </div>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="row g-3">
        <div class="col-6 input_group">
            @if(old('status') == 1)
                <input type="checkbox" name="status" value="1" checked="checked">
            @else
                <input type="checkbox" name="status" value="1">
            @endif
            <label for="">
                Ưu đãi
            </label>
        </div>
        <div class="col-6 input_group">
            
        </div>
        <div class="col-6 input_group">
            @if(old('on_sale') == 1)
                <input type="checkbox" name="on_sale" value="1" checked="checked">
            @else
                <input type="checkbox" name="on_sale" value="1">
            @endif
            <label for="">
                Đề cử
            </label>
        </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Mã giảm giá</label>
        <input type="text" name="coupon" value="{{old('coupon')}}" class="form-control" id="" placeholder="Nhập mã giảm  giá">
        @error('coupon')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Số lượng mã giảm giá</label>
        <input type="text" name="count_coupon" value="{{old('count_coupon')}}" class="form-control" id="" placeholder="Nhập số lượng mã giảm giá">
        @error('count_coupon')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>
    <div class="row">
        <div class="col-6 input_group">
            <label for="">Thời gian chuẩn bị</label>
            <input type="text" name="time_preparation" value="{{old('time_preparation')}}" class="form-control" id="" placeholder="Nhập thời gian chuẩn bị">
            @error('time_preparation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
        </div>
        <div class="col-6 input_group">
            <label for="">Tag</label>
            <input type="text" name="tag" value="{{old('tag')}}" class="form-control" id="" placeholder="Nhập tag">
            @error('tag')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Nhà hàng</label>
        <select name="restaurant_id" id="input" class="form-control" required="required">
            <option value="">---Lựa chọn nhà hàng--</option>
            @foreach($restaurants as $restaurant)
            @if(old('restaurant_id') == $restaurant->id)
            <option value="{{$restaurant->id}}" selected>{{$restaurant->name}} </option>  
            @endif
            @if(old('restaurant_id') != $restaurant->id)
            <option value="{{$restaurant->id}}" >{{$restaurant->name}} </option>
            @endif
            @endforeach
        </select>
        @error('restaurant_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>

   <div>
       <button type="submit" class="btn btn-primary">Thêm mới</button>
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



