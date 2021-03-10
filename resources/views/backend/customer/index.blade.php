@extends('backend.layout.master')
@section('title','Danh sách khách hàng')
@section('content')

<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh sách khách hàng</div>
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
            <a href="{{route('customer.create')}}" class="btn btn-success">Thêm mới</a>
             </div>
        </form>
    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>SDT</th>
                <th>Đia chỉ</th>
                <th>Điểm tích lũy</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $customer)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->point_sale}}</td>
                <td>
                    <div class="action">
                        <form action="{{route('customer.destroy',['id'=>$customer->id])}}" method="POST"  class="form-action">
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
            {!! $customers->links() !!}
    </div>
</div>
@stop()