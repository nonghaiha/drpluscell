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
      <label for="">Màu sắc</label>
          <input type="text" class="form-control" name="color" v-model="color" value="{{old('color') }}" placeholder="Nhập kí hiệu thuộc tính...">
          @if ($errors->has('color'))
           <p class="text-danger">{{ $errors->first('color') }}</p>
           @endif
    </div>

    <div class="form-group">
      <label for="">Size</label>
          <input type="text" class="form-control" name="size" v-model="size" value="{{old('size') }}" placeholder="Nhập kí hiệu thuộc tính...">
          @if ($errors->has('size'))
           <p class="text-danger">{{ $errors->first('size') }}</p>
           @endif
    </div>
    <div class="form-group">
        <label for="">Tên thuộc tính</label>
          <input type="text" class="form-control" name="name"  value="" id="name" placeholder="Nhập tên thuộc tính...">
          @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
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
@section('js')
<script >
  
  var app=new Vue({
    el:'#app',
    data:function(){
       return{
       color:'',
       size:'',
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