@extends('Client.Home.index')

@section('title', 'Hồ sơ')
@section('content')
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-image: url("https://i.imgur.com/GMmCQHC.png");
            background-repeat: no-repeat;
            background-size: 100% 100%
        }

        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
        }

        .blue-text {
            color: #00BCD4
        }

        .form-control-label {
            margin-bottom: 0
        }

        input,
        textarea,
        button {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400
        }

        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer
        }

        .btn-block:hover {
            color: #fff !important
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }
    </style>
    
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                <h5 class="text-center mb-4">Địa chỉ nhận hàng</h5>
                @foreach($address as $value)
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Địa chỉ<span class="text-danger"> *</span></label> <input type="text" id="fname"  value="{{$value->address}}" placeholder="Nhập tên người dùng" > 
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Hồ sơ</h3>
                <div class="card">
                    <h5 class="text-center mb-4">Thông tin cá nhân</h5>
                    <form class="form-card" method="post" action="{{ route('client.profile.update',Session::get('user_id')) }}">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tên người dùng<span class="text-danger"> *</span></label> <input type="text" id="fname" name="user_name" value="{{$user->user_name}}" placeholder="Nhập tên người dùng" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Số điện thoại<span class="text-danger"> *</span></label> <input type="text" id="lname" name="user_phone" value="{{$user->user_phone}}" placeholder="Nhập số điện thoại" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Địa chỉ<span class="text-danger"> *</span></label> <input type="text" id="ans" name="user_address" value="{{$user->user_address}}" placeholder="Nhập địa chỉ" > </div>
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Thêm địa chỉ nhận hàng<span class="text-danger"> </span></label> <input type="text" id="ans" name="address" placeholder="Nhập địa chỉ" > </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Đăng ký</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
