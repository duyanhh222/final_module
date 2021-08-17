@extends('Layout.Admin.index')
@section('title','Food')
@section('main')
<form action="{{route('food.store')}}" method="POST" enctype="multipart/form-data">
@csrf
    <legend>Thêm mới món ăn</legend>
    <div class="col-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Thông tin món ăn</h3>
            </div>
        </div>
    </div>
    <br>
    <div class="row g-3">
    <div class="col-5">
        <label for="">Tên món</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="" placeholder="Nhập tên món">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-5">
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
    <div class="col-5">
        <label for="">Giá</label>
        <input type="text" name="price" value="{{old('price')}}" class="form-control" id="" placeholder="Nhập giá">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-5">
        <label for="">Giá khuyến mại</label>
        <input type="text" name="price_discount" value="{{old('price_discount')}}" class="form-control" id="" placeholder="Nhập giá khuyến mại">
         @error('price_discount')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>
    <div class="col-5">
        <label for="">Ảnh</label>
        <input type="file" name="file"  class="form-control" id="upload" placeholder="Input field">
        @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <img id="blah" src="" width="150px" />
    </div>
    <div class="form-group">
        <label>Ghi chú</label>
        <textarea class="form-control" name="description" required>{{old('description')}}</textarea>
    </div>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="row g-3">
        <div class="col-5">
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
    <div class="col-5">
        <label for="">Đề cử</label>
        <select name="on_sale" id="input" class="form-control" required="required">
                @if(old('on_sale') == 1)
                <option value="1" selected>Có</option>
                <option value="0" >Không</option>
                @else
                <option value="0" selected>Không</option>
                <option value="1" >Có</option>
                @endif
        </select>
    </div>
    </div>
    <div class="row g-3">
    <div class="col-5">
        <label for="">Mã giảm giá</label>
        <input type="text" name="coupon" value="{{old('coupon')}}" class="form-control" id="" placeholder="Nhập mã giảm  giá">
        @error('coupon')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-5">
        <label for="">Số lượng mã giảm giá</label>
        <input type="text" name="count_coupon" value="{{old('count_coupon')}}" class="form-control" id="" placeholder="Nhập số lượng mã giảm giá">
        @error('count_coupon')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>
    <div class="col-5">
        <label for="">Thời gian chuẩn bị</label>
        <input type="text" name="time_preparation" value="{{old('time_preparation')}}" class="form-control" id="" placeholder="Nhập thời gian chuẩn bị">
        @error('time_preparation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>
    <br>
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thông tin nhà hàng</h3>
            </div>
        </div>
    </div>
    <div class="row g-3">
    <div class="col-5">
        <label for="">Tên nhà hàng</label>
        <input type="text" name="restaurant_name" value="{{old('restaurant_name')}}" class="form-control" id="" placeholder="Nhập tên nhà hàng">
    @error('restaurant_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-5">
        <label for="">Địa chỉ nhà hàng</label>
        <input type="text" name="restaurant_address" value="{{old('restaurant_address')}}" class="form-control" id="" placeholder="Nhập địa chỉ nhà hàng">
    @error('restaurant_address')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
    <div class="col-5">
        <label for="">Giờ mở cửa</label>
        <input type="text" name="time_open" value="{{old('time_open')}}" class="form-control" id="" placeholder="Nhập giờ mở cửa">

    @error('time_open')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="col-5">
        <label for="">Giờ đóng cửa</label>
        <input type="text" name="time_close" value="{{old('time_close')}}" class="form-control" id="" placeholder="Nhập giờ đóng cửa">
    @error('time_close')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
        <div class="col-5">
            <label for="">Phí dịch vụ</label>
            <input type="text" name="service" value="{{old('service')}}" class="form-control" id="" placeholder="Nhập phí dịch vụ">
            @error('service')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    <div class="col-5">
        <label for="">Số điện thoại</label>
        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="" placeholder="Nhập số điện thoại">
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="row g-3">
        <div class="col-5">
            <label for="">Giải thích phí dịch vụ</label>
            <input type="text" name="explain" value="{{old('explain')}}" class="form-control" id="" placeholder="Giải thích phí dịch vụ">
            @error('explain')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    <div class="col-5">
        <label for="">Tag</label>
        <input type="text" name="tag" value="{{old('tag')}}" class="form-control" id="" placeholder="Nhập tag">
    @error('tag')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    </div>

   <div>
       <button type="submit" class="btn btn-primary">Thêm mới</button>
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
@stop()



