@extends('Layout.Client.index')
@section('title','Food')
@section('main')
<form action="{{route('client.storeFood')}}" method="POST" enctype="multipart/form-data" class="formcrud">
@csrf
<div>
    <div class="form_title">
        Thông tin món ăn
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Tên món</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="" placeholder="">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Danh mục</label>
        <select name="category_id" id="input" class="form-control" required="required">
            <option value="">---Lựa chọn danh mục---</option>
            @foreach($categories as $category)
            @if(old('category_id') == $category->id)
            <option value="{{$category->id}}" selected>{{$category->name}} </option>  
            @endif
            @if(old('category_id') != $category->id)
            <option value="{{$category->id}}" >{{$category->name}} </option>
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
            <input type="text" name="price" value="{{old('price')}}" class="form-control" id="" placeholder="">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-6 input_group">
            <label for="">Giá khuyến mại</label>
            <input type="text" name="price_discount" value="{{old('price_discount')}}" class="form-control" id="" placeholder="">
            @error('price_discount')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-6 input_group">
            <label for="">Ảnh</label>
            <input type="file" name="file"  class="form-control" id="upload" placeholder="">
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
        <label for="">Mã giảm giá</label>
        <input type="text" name="coupon" value="{{old('coupon')}}" class="form-control" id="" placeholder="">
        @error('coupon')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>   
    <div class="col-6 input_group">
        <label for="">Số lượng mã giảm giá</label>
        <input type="text" name="count_coupon" value="{{old('count_coupon')}}" class="form-control" id="" placeholder="">
        @error('count_coupon')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Thời gian chuẩn bị</label>
        <input type="text" name="time_preparation" value="{{old('time_preparation')}}" class="form-control" id="" placeholder="">
        @error('time_preparation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div> 
    <div class="col-6 input_group">
            <label for="">Ưu đãi</label>  
            <select name="status" id="input" class="form-control" required="required">
                @if(old('status') == 1)
                <option value="1" selected>Có</option>  
                <option value="0" >Không</option>  
                @else
                <option value="0" selected>Không</option>  
                <option value="1" >Có</option>  
                @endif
            </select>
        </div>
    </div>
    
    </div>
    <br>
    <div class="form_title">
        Thông tin nhà hàng
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Tên nhà hàng</label>
        <input type="text" name="restaurant_name" value="{{old('restaurant_name')}}" class="form-control" id="" placeholder="">
    @error('restaurant_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Địa chỉ nhà hàng</label>
        <input type="text" name="restaurant_address" value="{{old('restaurant_address')}}" class="form-control" id="" placeholder="">
    @error('restaurant_address')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Giờ mở cửa</label>
        <input type="text" name="time_open" value="{{old('time_open')}}" class="form-control" id="" placeholder="">
    
    @error('time_open')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Giờ đóng cửa</label>
        <input type="text" name="time_close" value="{{old('time_close')}}" class="form-control" id="" placeholder="">
    @error('time_close')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Giả thích phí dịch vụ</label>
        <input type="text" name="explain" value="{{old('explain')}}" class="form-control" id="" placeholder="">
    @error('explain')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Số điện thoại</label>
        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="" placeholder="">
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-6 input_group">
        <label for="">Phí dịch vụ</label>
        <input type="text" name="service" value="{{old('service')}}" class="form-control" id="" placeholder="">
    @error('service')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-6 input_group">
        <label for="">Tags</label>
        <input type="text" name="tag" value="{{old('tag')}}" class="form-control" id="" placeholder="">
    @error('tag')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>  
    </div>
    
   <div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-dark" style="float: right; margin-right:15px;" href="{{route('client.listFood')}}">Quay lại</a>
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



