@extends('backend.layout.master')
@section('title','Danh sách quản trị viên')
@section('content')

<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh sách quản trị viên</div>
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
            <a href="{{route('account.create')}}" class="btn btn-success">Thêm mới</a>
             </div>
        </form>
    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên quản trị viên</th>
                <th>Ảnh đại diện</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$user->name}}
                @if ($user->id==Auth::user()->id)
                     <i class="fa fa-circle text-success"> Online</i>
                @endif
                </td>
                <td><img src="{{ url('/backend') }}/avatar/{{$user->image}}" alt="" width="40"></td>
                <td>{{$user->email}}</td>
                <td>
                    @if ($user->id==Auth::user()->id)
                        <a href="{{route('account.edit',['id'=>$user->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                    
                    @else
                    <div class="action">
                        <a href="{{route('account.edit',['id'=>$user->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                        <form action="{{route('account.destroy',['id'=>$user->id])}}" method="POST"  class="form-action">
                                @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
                        </form>
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" paging">
            {!! $users->links() !!}
    </div>
</div>
@stop()