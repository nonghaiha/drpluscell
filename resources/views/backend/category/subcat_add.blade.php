@extends('backend.layout.master')
@section('title','Thêm mới danh mục con')
@section('content')

<form action="{{ route('post_add_dm_con_category',['id'=>$parent_id]) }}" method="POST" role="form" class="col-md-6"> 
  	<legend>Thêm mới</legend>
      @csrf
  	<div class="form-group">
  		<label for="">Tên danh mục</label>
          <input type="text" class="form-control" name="name" value="{{old('name') }}" placeholder="Nhập tên danh mục...">
          @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
           @endif
  	</div>
  	<div class="form-group">
  		<label for="">Trang thái</label>
  		<div class="radio">
    	<label>
    		<input type="radio" name="status" id="input" value="1" checked="checked">
    		Hiện
    	</label>
    	<label>
    		<input type="radio" name="status" id="input" value="0" >
    		Ẩn
    	</label>
    </div>
  	</div>

      <button type="submit" class="btn btn-primary">Thêm mới</button>
     
  </form>
@stop()