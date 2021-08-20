@extends('Layout.Admin.index')
@section('title','Config')
@section('main')
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Ngày cập nhật</th>

                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$config->phone}}</td>
                    <td>{{$config->email}}</td>
                    <td>{{$config->address}}</td>
                    <td>{{$config->updated_at}}</td>

{{--                    <td><img src="{{asset('storage/images/'.$config->image)}}" width="100px" alt=""></td>--}}
                    <td>
                        <a href="" class="btn btn-sm btn-primary">
                            <i class="fa fa-file"></i>
                        </a>
                        <a href="{{ route('config.edit') }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@stop()

