@extends('Layout.Admin.index')
@section('title','Category')
@section('main')
<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <legend>Thêm  mới danh mục</legend>
    <div class="col-4">
        <label for="">Tên danh mục</label>
        <input type="text" name="name" class="form-control" id="" placeholder="Nhập tên danh mục">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="col-4">
        <label class="custom-file-upload">
            <i class="fas fa-images fa-4x"></i>
            <input type="file" name="file"  class="form-control" id="upload" placeholder="">
        </label>
    </div>
    <div>
        <img id="blah" src="" width="200px" />
    </div>
    @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a class="btn btn-dark"  href="{{route('category.index')}}">Quay lại</a>
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
<link rel="stylesheet" href="{{ asset('Form/css/form.css') }}">
@stop()
