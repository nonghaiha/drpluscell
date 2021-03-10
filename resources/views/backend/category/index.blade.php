@extends('backend.layout.master')
@section('title','Quản lý danh mục')
@section('content')


<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh sách danh mục</div>
    <div class="panel-body">
        <div>
            <a href="{{route('category.create')}}" class="btn btn-success">Thêm mới</a>
        </div>
        <div>
        <form action="{{route('category.search')}}" method="post" role="form">
            @csrf
            <input type="text" name="search" placeholder="Mời nhập ..." class="form-control col-md-5">
            <input type="submit" value="Tìm kiếm" class="btn btn-success col-md-1">
        </form>
        </div>
    </div>
    @php
        $cap=1;
    @endphp
    <!-- Table -->
    @include('backend.category.list_category')
</div>

@stop()
@section('js')

@stop()
