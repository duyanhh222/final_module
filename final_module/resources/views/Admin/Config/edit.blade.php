@extends('Layout.Admin.index')
@section('title','Config')
@section('main')
    <form action="{{route('config.update',$config->id)}}" method="POST" enctype="multipart/form-data" class="formcrud">
        @csrf
        <div>
            <div class="form_title">
                Thông tin website
            </div>
            <div class="row g-3">
                <div class="col-6 input_group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" value="{{$config->phone}}" class="form-control" id="" placeholder="">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 input_group">
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{$config->email}}" class="form-control" id="" placeholder="">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row g-3">
                <div class="col-6 input_group">
                    <label for="">Facebook</label>
                    <input type="text" name="facebook" value="{{$config->facebook}}" class="form-control" id="" placeholder="">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 input_group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" value="{{$config->address}}" class="form-control" id="" placeholder="">
                    @error('price_discount')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6 input_group">
                    <label for="">Banner 1</label>
                    <input type="file" name="banner1"  class="form-control" id="upload" placeholder="">
                    <input type="hidden" name="file_file" value="{{$config->banner1}}" >
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <img id="blah" src="{{asset('Client/images/'.$config->banner1)}}" width="150px" />
            </div>


            <div class="row">
                <div class="col-6 input_group">
                    <label for="">Logo</label>
                    <input type="file" name="logo"  class="form-control" id="upload" placeholder="">
                    <input type="hidden" name="file_file" value="{{$config->logo}}" >
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <img id="blah" src="{{asset('Client/images/'.$config->logo)}}" width="30px" />
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-dark" style="float: right; margin-right:15px;" href="{{route('config.index')}}">Quay lại</a>
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
