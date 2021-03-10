@extends('backend.layout.master')
@section('title','Thêm mới sản phẩm')
@section('content')

<form action="{{ route('product.store') }}" method="POST" role="form" class="col-md-12" enctype="multipart/form-data">
    <legend>Thêm mới</legend>
      @csrf
    <div class="col-md-8">
      <div class="form-group">
        <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" value="{{old('name') }}" placeholder="Nhập tên sản phẩm...">
                @if ($errors->has('name'))
                 <p class="text-danger">{{ $errors->first('name') }}</p>
                 @endif
      </div>
      <div class="form-group">
        <label for="">Mô tả</label>
            <textarea name="content" id="content"></textarea>
      </div>
      <div class="form-group">
          <label for="">List ảnh</label>
          <div class="row">
            <div class="col-md-3">
              <a class="thumbnail multi-select">
                <img src="http://localhost/laravel_shop_quan_ao/public/backend/images/no-ig.png" alt="">
              </a>
            </div>
          </div>
          <div class="row" id="list-img">
          </div>
      </div>
      <textarea name="images"  id="images" class="form-control hidden" rows="3" required="required"></textarea>

    </div>
    <div class="col-md-4">
      <div class="form-group" >
        <label>Ảnh sản phẩm</label>
      
            <div class="input-group">
              <input type="" name="image" id="img" class="form-control hidden">
                <div class="input-group-addon" style="padding: 0">
                  <a data-toggle="modal" href='#modal-id'class="btn btn-default"><img id="avatar" class="thumbnail" width="100%"  src="http://localhost/laravel_shop_quan_ao/public/backend/images/no-ig.png"></a>
                </div>
            </div>
      </div>
      <div class="form-group">
        <label for="">Giá sản phẩm</label>
            <input type="text" class="form-control" name="price" value="{{old('price') }}" placeholder="Nhập giá sản phẩm...">
            @if ($errors->has('price'))
             <p class="text-danger">{{ $errors->first('price') }}</p>
             @endif
      </div>
      <div class="form-group">
        <label for="">Khuyễn mãi</label>
            <input type="text" class="form-control" name="sale" value="{{old('sale') }}" placeholder="Nhập khuyễn mãi...">
            @if ($errors->has('sale'))
             <p class="text-danger">{{ $errors->first('sale') }}</p>
             @endif
      </div>
      <div class="form-group">
        <label for="">Danh mục</label>
            <select name="category_id"  class="form-control" required="required">
              @foreach ($categorys as $cat)
                {{-- expr --}}
              
              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
              @endforeach
            </select>
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
<div class="modal fade" id="modal-multi">
  <div class="modal-dialog modal-lg" style="width: 85%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Quản lý ảnh</h4>
      </div>
      <div class="modal-body">
         <iframe src="http://localhost/laravel_shop_quan_ao/public/backend/file/dialog.php?akey=DdHNiy0mgZKgSG89CfBfGIG0WFIScWlj8LgXtWW8Di0&field_id=images" style="border: 0; height: 500px; overflow-y: auto;width: 100%"></iframe>
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
    $('.multi-select').click(function(){
      $('#modal-multi').modal('show');

      $('#modal-multi').on('hide.bs.modal',function(){
        var img_srcs = $('#images').val();
        var img_list = $.parseJSON(img_srcs);
        var img_1 = '';
        var input_img = '';
        
        for (var i = 0; i < img_list.length; i++) {
          img_1 += '<div class="col-md-3"><a class="thumbnail multi-select"><img src="'+img_list[i]+'" alt=""></a></div>';
          input_img += '<input type="" name="anh_khac[]" value="'+img_list[i]+'" class="form-control"/>'
          
        }

        $('#list-img').html(img_1);
      })
    });
    $('#modal-id').on('hide.bs.modal',function(){
      var img_src = $('input#img').val();
      $('img#avatar').attr('src',img_src);
    });
    

</script> 
@stop()