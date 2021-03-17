@extends('backend.layout.master')

@section('title','Update sản phẩm')

@section('body-class','product')

@section('content')

    <form action="{{ route('product.update',['id'=>$product->id]) }}" method="POST" role="form" class="col-md-12"
          enctype="multipart/form-data">
        <legend>Update</legend>
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" value="{{$product->name }}"
                       placeholder="Nhập tên sản phẩm...">
                @if ($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="content" id="content"><?=$product->content?></textarea>
            </div>
            <div class="form-group">
                <label for="">List ảnh</label>
                <div class="row">
                    <div class="col-md-12">
                        <a class="thumbnail multi-select">
                            @foreach($product->media as $media)
                                <img src="{{asset('storage/images/products') . '/' . $media->image}}" alt="">
                            @endforeach
                        </a>
                    </div>
                </div>
                <div class="row" id="list-img">
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <div class="input-group">
                    <input type="file" name="image[]" id="img" class="form-control" multiple>
                </div>
            </div>
            <div class="form-group">
                <label for="">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price" value="{{$product->price }}"
                       placeholder="Nhập giá sản phẩm...">
                @if ($errors->has('price'))
                    <p class="text-danger">{{ $errors->first('price') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="">Khuyễn mãi</label>
                <input type="text" class="form-control" name="sale" value="{{$product->sale }}"
                       placeholder="Nhập khuyễn mãi...">
                @if ($errors->has('sale'))
                    <p class="text-danger">{{ $errors->first('sale') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="category_id" class="form-control" required="required">
                    @foreach ($categorys as $cat)
                        {{-- expr --}}

                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            @php
                $check0=$product->status==0 ? 'checked' : '';
                $check1=$product->status==1 ? 'checked' : '';
            @endphp
            <div class="form-group">
                <label for="">Trang thái</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" id="input" value="1" {{ $check1 }}>
                        Hiển thị
                    </label>
                    <label>
                        <input type="radio" name="status" id="input" value="0" {{ $check0 }}>
                        Ẩn
                    </label>
                </div>
            </div>


        </div>

        <button type="submit" class="btn btn-primary">Update</button>

    </form>

@stop()
@section('js')
    <script type="text/javascript">

        // Multiple images preview in browser
        $(function () {
            var imagesPreview = function (input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function (event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#img').on('change', function () {
                $('.thumbnail.multi-select img').remove();
                imagesPreview(this, '.thumbnail.multi-select');
            });

        })

    </script>
@stop()
