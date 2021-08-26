@extends('Client.Home.index')

@section('title', 'Đăng ký đối tác')
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
                <h3>Đăng ký quán đối tác</h3>
                <div class="card">
                    <h5 class="text-center mb-4">Điền thông tin nhà hàng</h5>
                    <form class="form-card" method="post" action="{{ route('client.partner.add') }}">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tên nhà hàng<span class="text-danger"> *</span></label> <input type="text" id="fname" name="name" placeholder="Nhập tên nhà hàng" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Số điện thoại<span class="text-danger"> *</span></label> <input type="text" id="lname" name="phone" placeholder="Nhập số điện thoại" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Giờ mở cửa<span class="text-danger"> *</span></label> <input type="text" id="email" name="time_open" placeholder="Nhập giờ mở cửa" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Giờ đóng cửa<span class="text-danger"> *</span></label> <input type="text" id="mob" name="time_close" placeholder="Nhập giờ đóng cửa" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phí dịch vụ<span class="text-danger"> *</span></label> <input type="text" id="job" name="service" placeholder="Nhập phí dịch vụ"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Giải thích phí dịch vụ<span class="text-danger"> *</span></label> <input type="text" id="explain" name="job" placeholder="Giải thích phí dịch vụ" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Địa chỉ<span class="text-danger"> *</span></label> <input type="text" id="ans" name="address" placeholder="Nhập địa chỉ" > </div>
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
