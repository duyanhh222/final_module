@extends('Layout.Admin.index')
@section('title','Category')
@section('main')
<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <legend>Form title</legend>
    <div class="form-group">
        <label for="">name</label>
        <input type="text" name="name" class="form-control" id="" placeholder="Input field">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">image</label>
        <input type="file" name="file"  class="form-control" id="" placeholder="Input field">
    </div>
    @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()