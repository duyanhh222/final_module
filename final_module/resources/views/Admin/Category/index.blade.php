@extends('Layout.Admin.index')
@section('title','Category')
@section('main')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Ảnh</th>
                <th>Số lượng địa điểm</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><img src="{{asset('storage/images/'.$category->image)}}" width="100px" alt=""></td>
                <td>{{$category->amount}}</td>
                <td>
                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{route('category.destroy',$category->id)}}" class="btn btn-sm btn-danger btndelete" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $categories->appends(request()->all())->links() }}
@stop()
