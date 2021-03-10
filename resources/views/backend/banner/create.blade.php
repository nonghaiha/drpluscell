@extends('backend.layout.master')
@section('title','Thêm mới danh mục')
@section('content')

<form action="{{ route('banner.store') }}" method="POST" role="form" class="col-md-12" enctype="multipart/form-data">
  	<legend>Thêm mới</legend>
      @csrf
  	<div class="form-group">
  		<label for="">Tên Banner</label>
          <input type="text" class="form-control" name="name" value="{{old('name') }}" placeholder="Nhập tên danh mục...">
          @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
           @endif
  	</div>

    <div class="form-group">
      <label for="">Link Banner</label>
          <input type="text" class="form-control" name="link" value="{{old('link') }}" placeholder="Nhập tên danh mục...">
          @if ($errors->has('link'))
           <p class="text-danger">{{ $errors->first('link') }}</p>
           @endif
    </div>

    <div class="form-group">
      <label for="">Mô tả</label>
          <textarea name="content" id="content"></textarea>
    </div>
    <div class="form-group">
      <label for="">Trang thái</label>
        <div class="radio">
         <label>
          <input type="radio" name="location_content" id="input" value="1" checked="checked">
          Trái
        </label>
        <label>
          <input type="radio" name="location_content" id="input" value="0" >
          Phải
        </label>
      </div>
    </div>

    <div class="form-group" >
      <label>Ảnh Banner</label>

          <div class="input-group">
            <input type="" name="image" id="img" class="form-control hidden">
              <div class="input-group-addon" style="padding: 0">
                <a data-toggle="modal" href='#modal-id'class="btn btn-default"><img id="avatar" class="thumbnail" width="100%"  src="http://localhost/laravel_shop_quan_ao/public/backend/images/no-ig.png"></a>
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
        <iframe src="http://localhost/laravel_shop_quan_ao/public/backend/file/dialog.php?akey=DdHNiy0mgZKgSG89CfBfGIG0WFIScWlj8LgXtWW8Di0&field_id=img" style="border: 0; height: 500px; overflow-y: auto;width: 100%"></iframe>
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