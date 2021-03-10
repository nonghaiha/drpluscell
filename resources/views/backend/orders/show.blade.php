@extends('backend.layout.master')
@section('title','Danh sách hóa đơn')
@section('content')
<div class="container">
 	<div class="row">
 		<div class="col-md-4">
 			<h2 class="text-center">Orders</h2>
 			<table class="table">
 				<thead>
 					<tr>
 						<th>ID:</th>
 						<th>{{ $orders->id }}</th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<th>Created:</th>
 						<th>{{ $orders->created_at}}</th>
 					</tr>
 				</tbody>
 			</table>

 		</div>
 		<div class="col-md-8">
 			<h2 class="text-center">Customer</h2>
 			<table class="table">
 				<thead>
 					<tr>
 						<th>Name:</th>
 						<th>{{ $orders->name }}</th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<th>Email:</th>
 						<th>{{ $orders->email }}</th>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 	<div class="row">
 		<h2 class="text-center"> Chi Tiết Đơn Hàng</h2>
 		<div class="table-responsive">
 			<table class="table table-hover">
 				<thead>
 					<tr>
 						<th>STT</th>
 						<th>Tên Sản phẩm</th>
 						<th>Số lượng</th>
 						<th>Giá</th>
 						<th>Khuyễn mãi</th>
 						<th>Thành tiền</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $stt=1;$tong=0; foreach ( $orders->product  as $key => $value) {?>
 						<tr>
 							<td>{{ $stt }}</td>
 							<td>{{ $value->name }}</td>
 							<td>{{ $value->pivot->quantity }}</td>
 							<td>{{ $value->pivot->price }}</td>
 							<td>{{ $value->sale }}%</td>
 							<td>{{ $t=$value->pivot->price-($value->pivot->price*$value->sale)/100 }} đ</td>
 						</tr>
 					<?php $stt++;$tong+=$t; } ?>
 				</tbody>
 				<tfoot>
 					<tr>
 						<th colspan="5">Tổng tiền</th>
 						<th>{{ $tong }}</th>
 					</tr>
 				</tfoot>
 			</table>
 		</div>
 		<form action="{{ route('orders.update',['id'=>$orders->id]) }}" method="POST" role="form" class="col-md-4" style="float: right">
	    	<legend>Cập nhật trạng thái</legend>
	    	@csrf
	        <input type="hidden" name="_method" value="PUT">
	    	<div class="form-group">
	    		<label for="">Trạng thái</label>
	    		<select name="status" id="input" class="form-control" required="required">
	    			<option value="2">Xác nhận và giao hàng</option>
	    			<option value="3">Xác nhận đã thanh toán</option>
	    		</select>
	    	</div>
	    	<button type="submit" class="btn btn-primary">Submit</button>
	    	<a href="{{ route('orders.index') }}" title="" class="btn btn-success">Back</a>
        </form>
 	</div>
    


 </div>
 @stop()