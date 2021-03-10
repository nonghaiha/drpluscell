@extends('backend.layout.master')
@section('title','Thêm kho sản phẩm')
@section('content')

<div class="box-body col-md-10">
    <div class="row">
        <div class="col-md-7">
            
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="{{ $product->image }}" alt="Image" width="50%">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Tên sản phẩm:{{ $product->name }}</h4>
                <p>Giá: {{ number_format($product->price) }} đ</p>
                <p> <?php $tong=0?>
                  @foreach ($product->attribute as $att)
                    <small class="btn btn-default btn-xs">{{($att->name)}}:{{($att->pivot->quantity)}} </small>
                    <?php $tong+=($att->pivot->quantity)?>
                    @endforeach</p>
                  <p>tổng sl sản phẩm:{{ $tong }}</p>
            </div>
        </div>
        </div>
        <div class="col-md-5">
            <form action="{{ route('post.product.kho',['id'=>$product->id]) }}" method="POST" role="form">
            <legend>Thêm mới</legend>
              @csrf
            <div class="form-group">
                <label for="">Loại</label>
                  <select name="attribute_id" id="" class="form-control" required="required">
                    <option value="">--Chọn loại--</option>
                @foreach ($attributes as $cl)
                    <option value="{{ $cl->id }}">{{ $cl->name }}</option>
                @endforeach
                
            </select>
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                  <input type="text" class="form-control" name="quantity" value="{{old('quantity') }}" placeholder="Nhập số lượng...">
                  @if ($errors->has('quantity'))
                   <p class="text-danger">{{ $errors->first('quantity') }}</p>
                   @endif
            </div>


              
              <button type="submit" class="btn btn-primary">Thêm vào kho</button>
               <a href="{{ route('product.index') }}" class="btn btn-warning">Trở lại</a>
             
          </form>
            
        </div>
    </div>
</div>

@stop()
@section('js')
<script type="text/javascript">
  
   
</script> 
@stop()