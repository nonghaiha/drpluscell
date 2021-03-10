@extends('backend.layout.master')
@section('title','Danh sách Banner')
@section('content')

<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh sách Banner</div>
    <div class="panel-body">
        <form action="" method="get" class="form-inline" role="form">

            <div class="col-md-6" class="form-search">
                                        
                <div class="input-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" id="search_btn" class="btn btn-primary"><i class="fa fa-search"></i>
                    </button>
                </span>
                
                </div>
            <a href="{{route('banner.create')}}" class="btn btn-success">Thêm mới</a>
             </div>
        </form>
    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Banner</th>
                <th>Ảnh</th>
                <th>Miêu tả</th>
                <th>Vị trí miêu tả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $key => $banner)
            @php
                $status=$banner->status==1?'Hiện':'Ẩn';
                $location=$banner->location_content==1?'Trái':'Phải';
            @endphp
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$banner->name}}
                </td>
                <td><img src="{{$banner->image}}" alt="" width="250px"></td>
                <td><?=$banner->content?></td>
                <td>{{$location}}</td>
                <td>{{$status}}</td>
                <td>
                    <div class="action">
                        <a href="{{route('banner.edit',['id'=>$banner->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                        <form action="{{route('banner.destroy',['id'=>$banner->id])}}" method="POST"  class="form-action">
                                @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" paging">
            {!! $banners->links() !!}
    </div>
</div>
@stop()