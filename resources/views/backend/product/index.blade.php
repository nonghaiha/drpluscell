@extends('backend.layout.master')
@section('title','Danh sách sản phẩm')
@section('content')
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh sách sản phẩm</div>
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
            <a href="{{route('product.create')}}" class="btn btn-success">Thêm mới</a>
             </div>
        </form>
    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Loại</th>
                <th>Giá</th>
                <th>Khuyến mãi</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
            @php
                $status=$product->status==1?'Hiển thị':'Ẩn';
            @endphp
            <tr>
                <td>{{$key+1}}</td>
                <td class="col-md-3">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{ $product->image }}" alt="Image" width="60">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $product->name }}</h4>
                            <p>{{ $product->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                </td>
                <td class="col-md-2">
                   @foreach ($product->attribute as $att)
                    <small class="btn btn-default btn-xs">{{($att->name)}}:{{($att->pivot->quantity)}} </small>
                    @endforeach
                </td>
                <td>{{ number_format($product->price)}} đ</td>
                <td>{{$product->sale}} %</td>
                <td>{{$status}}</td>
                <td>
                    <div class="action">
                        
                        <form action="{{route('product.destroy',['id'=>$product->id])}}" method="POST"  class="form-action">
                                @csrf
                        <a href="{{route('get.product.kho',['id'=>$product->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Nhập kho</a>
                        <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
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
            {!! $products->links() !!}
    </div>
</div>
@stop()