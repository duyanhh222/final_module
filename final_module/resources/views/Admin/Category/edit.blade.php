@extends('Layout.Admin.index')
@section('title','Cập nhật danh mục')
@section('main')
<form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <legend>Cập nhật danh mục</legend>
    <div class="col-4">
        <label for="">Tên danh mục</label>
        <input type="text" name="name" value="{{$category->name}}" class="form-control" id="" placeholder="Nhập tên danh mục">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="col-4">
        <label class="custom-file-upload">
            <i class="fas fa-images fa-4x"></i>
            <input type="file" name="file"  class="form-control" id="upload" placeholder="Input field">
            <input type="hidden" name="file_file" value="{{$category->image}}">
        </label>
        
    </div>
    @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div>
        <img id="blah" src="{{asset('storage/images/'.$category->image)}}" width="200px" />
    </div>
    
    <div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a class="btn btn-dark" href="{{route('category.index')}}">Quay lại</a>
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