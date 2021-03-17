@extends('backend.layout.master')
@section('title','Danh sách thuộc tính')
@section('content')

<div class="panel panel-primary" id="app">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh sách thuộc tính</div>
    <div class="panel-body " v-on:keyup="on_name">
    <form action="{{ route('attribute.store') }}" method="POST" role="form" class="col-md-4">
    <legend>Thêm mới</legend>
      @csrf

    <div class="form-group">
      <label for="">Dung tích</label>
          <input type="text" class="form-control" name="size" v-model="size" value="{{old('size') }}" placeholder="Nhập dung tích...">
          @if ($errors->has('size'))
           <p class="text-danger">{{ $errors->first('size') }}</p>
           @endif
    </div>
    <div class="form-group">
        <label for="">Đơn vị</label>
          <input type="text" class="form-control" name="type"  value="" id="name" placeholder="Nhập đơn vị...">
          @if ($errors->has('type'))
           <p class="text-danger">{{ $errors->first('type') }}</p>
           @endif
    </div>
      <button type="submit" class="btn btn-primary">Thêm mới</button>

  </form>


    <!-- Table -->
    @include('backend.attribute.list_att')
    </div>
    </div>
</div>
@stop()

