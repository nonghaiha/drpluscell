@extends('backend.layout.master')
@section('title','Thêm mới quản trị viên')
@section('content')

<form action="{{ route('account.store') }}" method="POST" role="form" enctype="multipart/form-data" class="col-md-6">
  	<legend>Thêm mới</legend>
      @csrf
  	<div class="form-group">
  		<label for="">Tên quản trị viên</label>
          <input type="text" class="form-control" name="name"  value="{{old('name') }}" placeholder="Nhập tên ...">
          @if ($errors->has('name'))
           <p class="text-danger">{{ $errors->first('name') }}</p>
          @endif
  	</div>
    <div class="form-group">
      <label for="">Tên tài khoản</label>
          <input type="text" class="form-control" id="user_name" name="usename"  value="{{old('usename') }}" placeholder="Nhập tên ...">
          @if ($errors->has('usename'))
           <p class="text-danger">{{ $errors->first('usename') }}</p>
          @endif
          <p class="text-danger" id="ajax_name" ></p>
    </div>

    <div class="form-group">
      <label for="">Email</label>
          <input type="text" class="form-control" id="user_email" name="email" value="{{old('email') }}" placeholder="Nhập email...">
          @if ($errors->has('email'))
           <p class="text-danger">{{ $errors->first('email') }}</p>
          @endif
           <p class="text-danger" id="ajax_email" ></p>
    </div>
    <div class="form-group" >
      <label>Ảnh đại diện</label>
          <input  id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
          <img id="avatar" class="thumbnail" width="200px" src="{{url('backend')}}/images/no-ig.png">
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

      <button type="submit" class="btn btn-primary">Thêm mới</button>
     
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
       ///ajax check_emal
      $('#user_email').change(function(){
         $email=$('#user_email').val();
         var _token=$('input[name="_token"]').val();
        $.ajax({
          url:'/admin/acount/api-check-email',
          type:'post',
          dataType:'json',
          data:{
            email:$email,
            _token:_token,
          },
          success:function(result)
          {
            if(result.status==false)
            $('#ajax_email').html(result.error);
            else $('#ajax_email').html('');
          }
      });
      });

        ///ajax check_emal
      $('#user_name').change(function(){
         $usename=$('#user_name').val();
         var _token=$('input[name="_token"]').val();
        $.ajax({
          url:'/admin/acount/api-check-name',
          type:'post',
          dataType:'json',
          data:{
            usename:$usename,
            _token:_token,
          },
          success:function(result)
          {
            if(result.status==false)
            $('#ajax_name').html(result.error);
            else $('#ajax_name').html('');
          }
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