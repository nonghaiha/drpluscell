@extends('frontend.layout.master')
@section('title','Checkout Success')
@section('main')
	<p class="alert alert-success text-center" style="text-transform: uppercase; font-size: 32px">Đặt mua thành công</p>
	<a href="{{route('product.all')}}" class="btn btn-dark" style="margin-left: 800px">Shop Now</a> <br>
	<br>
@stop