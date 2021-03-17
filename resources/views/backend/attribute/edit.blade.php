@extends('backend.layout.master')
@section('title','Sửa thuộc tính')
@section('content')

<div class="panel panel-primary" id="app">
    <!-- Default panel contents -->
    <div class="panel-heading">Sửa thuộc tính</div>
    <div class="panel-body " v-on:keyup="on_name">
    <form action="{{ route('attribute.update',['id'=>$attribute->id]) }}" method="POST" role="form" class="col-md-4">
    <legend>Sửa</legend>
      @csrf
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
      <label for="">Size</label>
          <input type="text" class="form-control" name="size" id="size" v-model="size" value="{{$attribute->size }}" placeholder="Nhập dung tích...">
          @if ($errors->has('size'))
           <p class="text-danger">{{ $errors->first('size') }}</p>
           @endif
    </div>
    <div class="form-group">
        <label for="">Đơn vị</label>
          <input type="text" class="form-control" name="type"  value="{{ $attribute->type }}" id="name" placeholder="Nhập đơn vị...">
          @if ($errors->has('type'))
           <p class="text-danger">{{ $errors->first('type') }}</p>
           @endif
    </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('attribute.index') }}" title="" class="btn btn-warning">Trở lại</a>
  </form>


    <!-- Table -->
    @include('backend.attribute.list_att')
    </div>
    </div>
</div>
@stop()
