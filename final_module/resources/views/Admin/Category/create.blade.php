@extends('Layout.Admin.index')
@section('main')
<form action="{{route('category.store')}}" method="POST" role="form">
    @csrf
    <legend>Form title</legend>
    <div class="form-group">
        <label for="">name</label>
        <input type="text" name="name" class="form-control" id="" placeholder="Input field">
    </div>
    @error('name')
        <small class="help-block">{{$message}}</small>
    @enderror
    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()