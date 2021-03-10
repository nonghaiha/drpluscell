@extends('backend.layout.master')
@section('title','Sửa quản trị viên')
@section('content')

<form action="{{ route('account.update',['id'=>$user->id]) }}" method="POST" role="form" enctype="multipart/form-data" class="col-md-6">
  	<legend>Thêm mới</legend>
      @csrf
      <input type="hidden" name="_method" value="PUT" placeholder="">
  	<div class="form-group">
  		<label for="">Tên quản trị viên</label>
          <input type="text" class="form-control" name="name"  value="{{$user->name }}" placeholder="Nhập tên ...">
          @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
          @endif
  	</div>
    <div class="form-group">
      <label for="">Tên tài khoản</label>
          <input type="text" class="form-control" id="user_name" name="usename" value="{{$user->usename }}" placeholder="Nhập tên ...">
          @if ($errors->has('usename'))
           <p class="text-danger">{{ $errors->first('usename') }}</p>
          @endif
    </div>

    <div class="form-group">
      <label for="">Email</label>
          <input type="text" class="form-control" id="user_email" name="email" value="{{$user->email }}" placeholder="Nhập email...">
          @if ($errors->has('email'))
           <p class="text-danger">{{ $errors->first('email') }}</p>
          @endif
    </div>
    <div class="form-group" >
      <label>Ảnh đại diện</label>
          <input  id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
          <img id="avatar" class="thumbnail" width="200px" src="{{url('backend')}}/avatar/{{ $user->image }}">
    </div>
  	<div class="form-group">
      <label for="">Mật khẩu</label>
          <input type="password" class="form-control" name="password" id="password"  placeholder="Nhập mật khẩu...">
          @if ($errors->has('password'))
           <p class="text-danger">{{ $errors->first('password') }}</p>
          @endif
           <p class="text-danger" id="error_password" ></p>
    </div>

    <div class="form-group">
      <label for="">Nhập lại mật khẩu</label>
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Nhập mật khẩu...">
          @if ($errors->has('confirm_password'))
           <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
          @endif
          <p class="text-danger" id="error_confirm_password" ></p>
    </div>

      <button type="submit" class="btn btn-primary">Updtae</button>
     
  </form>
@stop()

@section('js')
<script type="text/javascript">
  function changeImg(input){
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if(input.files && input.files[0]){
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e){
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#avatar').click(function(){
            $('#img').click();
        });
    });
      
      ///js check confirm_password
      $('#confirm_password').change(function(){
          $password=$('#password').val();
          $confirm_password=$('#confirm_password').val();
          if($password==''){
            $('#error_password').html('Bạn phải nhập mật khẩu trước !');
            $('#confirm_password').val('');
          }
          if($password!= $confirm_password && $password!='')
          {
            $('#error_password').html('');
            $('#error_confirm_password').html('Mật khẩu nhập lại không chính sác !');
            $('#confirm_password').val('');
          }
          if($password== $confirm_password)
          {
            $('#error_password').html('');
            $('#error_confirm_password').html('');
          }
      })

</script>
@stop()