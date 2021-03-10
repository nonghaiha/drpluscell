@extends('frontend.layout.master')
@section('title','Create Account Success')
@section('main')
	<p class="alert alert-success text-center" style="text-transform: uppercase; font-size: 32px">Đăng ký tài khoản thành công</p>
	<a href="{{route('frontend.layout')}}" class="btn btn-dark" style="margin-left: 800px">Back Home</a> <br>
	<br>
@stop