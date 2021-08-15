@extends('Layout.Admin.index')
@section('title','Food')
@section('main')
<form action="{{route('food.store')}}" method="POST" enctype="multipart/form-data">
@csrf
    <legend>Form title</legend>

    <div class="form-group">
        <label for="">name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">category</label>
        <select name="category_id" id="input" class="form-control" required="required">
            <option value="">---Lựa chọn danh mục---</option>
            @foreach($data as $cat)
            @if(old('category_id') == $cat->id)
            <option value="{{$cat->id}}" selected>{{$cat->name}} </option>  
            @endif
            @if(old('category_id') != $cat->id)
            <option value="{{$cat->id}}" >{{$cat->name}} </option>
            @endif
            @endforeach
        </select>
    </div>
    @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">price</label>
        <input type="text" name="price" value="{{old('price')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">price_discount</label>
        <input type="text" name="price_discount" value="{{old('price_discount')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('price_discount')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">image</label>
        <input type="file" name="file"  class="form-control" id="" placeholder="Input field">
    </div>
    @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" id="summernote" cols="30" rows="10">{{old('description')}}</textarea>
    </div>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">món ăn ưu đãi</label>  
        <div class="radio">
            <label>
                <input type="radio" name="status"  value="1" checked="checked">
                có
            </label>
            <label>
                <input type="radio" name="status"  value="0" checked="checked">
                không
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="">món ăn đề cử</label>  
        <div class="radio">
            <label>
                <input type="radio" name="on_sale"  value="1" checked="checked">
                có
            </label>
            <label>
                <input type="radio" name="on_sale"  value="0" checked="checked">
                không
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="">coupon</label>
        <input type="text" name="coupon" value="{{old('coupon')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('coupon')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">count_coupon</label>
        <input type="text" name="count_coupon" value="{{old('count_coupon')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('count_coupon')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">time_preparation</label>
        <input type="text" name="time_preparation" value="{{old('time_preparation')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('time_preparation')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">Tên nhà hàng</label>
        <input type="text" name="restaurant_name" value="{{old('restaurant_name')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('restaurant_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">Địa chỉ nhà hàng</label>
        <input type="text" name="restaurant_address" value="{{old('restaurant_address')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('restaurant_address')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">time_open</label>
        <input type="text" name="time_open" value="{{old('time_open')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('time_open')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">time_close</label>
        <input type="text" name="time_close" value="{{old('time_close')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('time_close')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">explain</label>
        <input type="text" name="explain" value="{{old('explain')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('explain')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">phone</label>
        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">service</label>
        <input type="text" name="service" value="{{old('service')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('service')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">tag</label>
        <input type="text" name="tag" value="{{old('tag')}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('tag')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    

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
