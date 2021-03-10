@extends('backend.layout.master')
@section('title','Danh sách hóa đơn')
@section('content')

<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh sách hóa đơn</div>
    

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>SDT</th>
                <th>Ngày mua</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
            @php
                $status='';
                $class='';
                if($order->status==1){$status='Chưa sử lý';$class='btn-warning';}
                elseif($order->status==2){$status='Đang giao hàng';$class='btn-primary';}
                elseif($order->status==3){$status='Đã thanh toán';$class='btn-success';}
            @endphp
            <tr> 
                <td>{{$key+1}}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <small class="btn {{ $class }}">{{ $status }}</small>
                </td>
                <td>
                    <div class="action">
                        <form action="{{route('orders.destroy',['id'=>$order->id])}}" method="POST"  class="form-action">
                                @csrf
                        <a href="{{route('orders.show',['id'=>$order->id])}}" class="btn btn-warning btn-sm">Show</a>
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
            {!! $orders->links() !!}
    </div>
</div>
@stop()