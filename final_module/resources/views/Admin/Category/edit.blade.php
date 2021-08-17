@extends('Layout.Admin.index')
@section('title','Category')
@section('main')
<form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <legend>Form title</legend>
    <div class="col-4">
        <label for="">name</label>
        <input type="text" name="name" value="{{$category->name}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="col-4">
        <label for="">image</label>
        <input type="file" name="file"  class="form-control" id="upload" placeholder="Input field">
        <input type="hidden" name="file_file" value="{{$category->image}}">
    </div>
    @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div>
        <img id="blah" src="{{asset('storage/images/'.$category->image)}}" width="200px" />
    </div>
    <div class="col-4">
        <label for="">amount</label>
        <input type="number" name="amount" value="{{$category->amount}}" class="form-control" id="" placeholder="Input field">
    </div>
    @error('amount')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
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