@extends('backend.layout.master')
@section('title','Thêm mới danh mục')
@section('content')

<form action="{{ route('banner.update',['id'=>$banner->id]) }}" method="POST" role="form" class="col-md-12" enctype="multipart/form-data">
  	<legend>Thêm mới</legend>
      @csrf
      <input type="hidden" name="_method" value="PUT">
  	<div class="form-group">
  		<label for="">Tên Bnaner</label>
          <input type="text" class="form-control" name="name" value="{{ $banner->name }}" placeholder="Nhập tên danh mục...">
          @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
           @endif
  	</div>

    <div class="form-group">
      <label for="">Link Bnaner</label>
          <input type="text" class="form-control" name="link" value="{{$banner->link }}" placeholder="Nhập tên danh mục...">
          @if ($errors->has('link'))
           <p class="text-danger">{{ $errors->first('link') }}</p>
           @endif
    </div>

    <div class="form-group">
      <label for="">Mô tả</label>
          <textarea name="content" id="content"><?=$banner->content?></textarea>
    </div>
    @php
          $check0=$banner->status==0 ? 'checked' : '';
          $check1=$banner->status==1 ? 'checked' : '';
    @endphp
    <div class="form-group">
      <label for="">Trang thái</label>
        <div class="radio">
         <label>
          <input type="radio"  name="location_content" id="input" value="1" {{ $check1 }}>
          Trái
        </label>
        <label>
          <input type="radio" name="location_content" id="input" value="0" {{ $check0 }}>
          Phải
        </label>
      </div>
    </div>

    <div class="form-group" >
      <label>Ảnh banner</label>

          <div class="input-group">
            <input type="" name="image" id="img" class="form-control hidden">
              <div class="input-group-addon" style="padding: 0">
                <a data-toggle="modal" href='#modal-id'class="btn btn-default"><img id="avatar" class="thumbnail" width="100%"  src="{{ $banner->image }}"></a>
              </div>
          </div>
    </div>
    
    <div class="form-group">
      <label for="">Trang thái</label>
        <div class="radio">
         <label>
          <input type="radio" name="status" id="input" value="1" checked="checked">
          Hiển thị
        </label>
        <label>
          <input type="radio" name="status" id="input" value="0" >
          Ẩn
        </label>
      </div>
    </div>

      <button type="submit" class="btn btn-primary">Thêm mới</button>
     
  </form>


  <div class="modal fade" id="modal-id">
  <div class="modal-dialog modal-lg" style="width: 85%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Quản lý ảnh</h4>
      </div>
      <div class="modal-body">
        <iframe src="http://shop.todo.com/backend/file/dialog.php?akey=DdHNiy0mgZKgSG89CfBfGIG0WFIScWlj8LgXtWW8Di0&field_id=img" style="border: 0; height: 500px; overflow-y: auto;width: 100%"></iframe>
      </div>
    </div>
  </div>
</div>
@stop()
@section('js')
<script type="text/javascript">
  
    $(document).ready(function() {
        $('#avatar').click(function(){
            $('#img').click();
        });
    });
    $('#modal-id').on('hide.bs.modal',function(){
      var img_src = $('input#img').val();
      $('img#avatar').attr('src',img_src);
    })

</script> 
@stop()