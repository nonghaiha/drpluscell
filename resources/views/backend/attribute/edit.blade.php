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
      <label for="">Màu sắc</label>
          <input type="text" class="form-control" name="color" id="color" v-model="color" value="{{$attribute->color }}" placeholder="Nhập kí hiệu thuộc tính...">
          @if ($errors->has('color'))
           <p class="text-danger">{{ $errors->first('color') }}</p>
           @endif
    </div>

    <div class="form-group">
      <label for="">Size</label>
          <input type="text" class="form-control" name="size" id="size" v-model="size" value="{{$attribute->size }}" placeholder="Nhập kí hiệu thuộc tính...">
          @if ($errors->has('size'))
           <p class="text-danger">{{ $errors->first('size') }}</p>
           @endif
    </div>
    <div class="form-group">
        <label for="">Tên thuộc tính</label>
          <input type="text" class="form-control" name="name"  value="{{ $attribute->name }}" id="name" placeholder="Nhập tên thuộc tính...">
          @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
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
@section('js')
<script >
  
  var app=new Vue({
    el:'#app',
    data:function(){
       return{
       color:$('#color').val(),
       size:$('#size').val(),
       name:'',

       }
    },
    methods:{
      on_name:function(){
        this.name=this.color+'-'+this.size;
        $('#name').val(this.name);
      }
    }
  });
</script>
@stop()