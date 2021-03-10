@extends('backend.layout.master')
@section('title','Danh mục con của :'.$subcategory->name)
@section('content')


<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh sách danh mục con</div>
    <div class="panel-body">
        
            <a href="{{route('get_add_dm_con_category',['id'=>$subcategory->id])}}" class="btn btn-success">Thêm mới</a>
            <a href="{{route('category.index')}}" class="btn btn-danger">Trở lại</a>
             </div>

    <!-- Table -->
    @include('backend.category.list_category')
</div>
</div>

@stop()
@section('js')

@stop()