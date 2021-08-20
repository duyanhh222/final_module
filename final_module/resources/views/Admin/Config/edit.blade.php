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

            <div class="row g-3">
                <div class="col-6 input_group">
                    <label class="custom-file-upload">Logo
                        <i class="fas fa-images fa-1x"></i>
                        <input type="file" name="logo"  class="form-control" id="upload" placeholder="">
                        <input type="hidden" name="file_logo" value="{{$config->logo}}" >
                    </label>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="blah" src="{{asset('storage/images/'.$config->logo)}}" width="30px" />
                </div>
            </div>
            <div class="row g-3">
                <div class="col-6 input_group">
                    <label class="custom-file-upload">Banner 1
                        <i class="fas fa-images fa-1x"></i>
                        <input type="file" name="banner1"  class="form-control" id="upload" placeholder="">
                        <input type="hidden" name="file_banner1" value="{{$config->banner1}}" >
                    </label>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="blah" src="{{asset('storage/images/'.$config->banner1)}}" width="150px" />
                </div>
            </div>

            <div class="row g-3">
                <div class="col-6 input_group">
                    <label class="custom-file-upload">Banner 2
                        <i class="fas fa-images fa-1x"></i>
                        <input type="file" name="banner2"  class="form-control" id="upload" placeholder="">
                        <input type="hidden" name="file_banner2" value="{{$config->banner2}}" >
                    </label>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="blah" src="{{asset('storage/images/'.$config->banner2)}}" width="150px" />
                </div>
            </div>

            <div class="row g-3">
                <div class="col-6 input_group">
                    <label class="custom-file-upload">Banner 3
                        <i class="fas fa-images fa-1x"></i>
                        <input type="file" name="banner3"  class="form-control" id="upload" placeholder="">
                        <input type="hidden" name="file_banner3" value="{{$config->banner3}}" >
                    </label>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="blah" src="{{asset('storage/images/'.$config->banner3)}}" width="150px" />
                </div>
            </div>

            <div class="row g-3">
                <div class="col-6 input_group">
                    <label class="custom-file-upload">Char 1
                        <i class="fas fa-images fa-1x"></i>
                        <input type="file" name="char1"  class="form-control" id="upload" placeholder="">
                        <input type="hidden" name="file_char1" value="{{$config->char1}}" >
                    </label>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="blah" src="{{asset('storage/images/'.$config->char1)}}" width="30px" />
                </div>

                <div>
                    <input type="text" name="char_title1" value="{{$config->char_title1}}" class="form-control" id="" placeholder="">

                </div>

            </div>


            <div class="row g-3">
                <div class="col-6 input_group">
                    <label class="custom-file-upload">Char 2
                        <i class="fas fa-images fa-1x"></i>
                        <input type="file" name="char2"  class="form-control" id="upload" placeholder="">
                        <input type="hidden" name="file_char2" value="{{$config->char2}}" >
                    </label>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="blah" src="{{asset('storage/images/'.$config->char2)}}" width="30px" />
                </div>

                <div>
                    <input type="text" name="char_title2" value="{{$config->char_title2}}" class="form-control" id="" placeholder="">

                </div>

            </div>

            <div class="row g-3">
                <div class="col-6 input_group">
                    <label class="custom-file-upload">Char 3
                        <i class="fas fa-images fa-1x"></i>
                        <input type="file" name="char3"  class="form-control" id="upload" placeholder="">
                        <input type="hidden" name="file_char3" value="{{$config->char3}}" >
                    </label>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="blah" src="{{asset('storage/images/'.$config->char3)}}" width="30px" />
                </div>

                <div>
                    <input type="text" name="char_title3" value="{{$config->char_title3}}" class="form-control" id="" placeholder="">

                </div>

            </div>


            <div class="row g-3">
                <div class="col-6 input_group">
                    <label class="custom-file-upload">Char 4
                        <i class="fas fa-images fa-1x"></i>
                        <input type="file" name="char4"  class="form-control" id="upload" placeholder="">
                        <input type="hidden" name="file_char4" value="{{$config->char4}}" >
                    </label>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="blah" src="{{asset('storage/images/'.$config->char4)}}" width="30px" />
                </div>

                <div>
                    <input type="text" name="char_title4" value="{{$config->char_title4}}" class="form-control" id="" placeholder="">

                </div>

            </div>
            <p>Cập nhật lần cuối ngày:<strong>{{ $config->updated_at }}</strong> </p>

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
