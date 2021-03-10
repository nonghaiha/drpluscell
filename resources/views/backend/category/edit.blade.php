@extends('backend.layout.master')
@section('title','Sửa danh mục')
@section('content')

<form action="{{ route('category.update',['id'=>$cat_edit->id]) }}" method="POST" role="form">
  	<legend>Sửa danh mục:{{ $cat_edit->name }}</legend>
      @csrf
      <input type="hidden" name="_method" value="PUT">
  	<div class="form-group">
  		<label for="">Name</label>
      {{ $cat_edit->name }}
          <input type="text" class="form-control" name="name" value="{{ $cat_edit->name }}" placeholder="Nhập tên danh mục...">
           @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
           @endif
  	</div>
  	<div class="form-group">
  		<label for="">Status</label>
  		<div class="radio">
        @php
          $check0=$cat_edit->status==0 ? 'checked' : '';
          $check1=$cat_edit->status==1 ? 'checked' : '';
        @endphp
    	<label>
    		<input type="radio" name="status" id="input" value="1" {{ $check1 }}>
    		Hiện
    	</label>
    	<label>
    		<input type="radio" name="status" id="input" value="0" {{ $check0 }}>
    		Ẩn
    	</label>
    </div>
  	</div>

      <button type="submit" class="btn btn-primary">Sửa</button>
     
  </form>

@stop()