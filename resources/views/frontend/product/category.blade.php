@extends('frontend.layout.master')
@section('title','List Item')
@section('main')

    <div class="container">
        <div class="row">
            <div class="col-lg-9">

                <div class="row row-sm">
                    <h2 class="h3 title mb-4 text-center" style="margin: 0 auto;font-size: 34px">{{$ca->name}}</h2>
                    <div class="featured-products owl-carousel owl-theme product-sort">
                        @foreach($products as $prod)
                            <div class="product">
                                <figure class="product-image-container">
                                    <a href="{{route('product.list',['slug' => $prod->slug ,'id' => $prod->id])}}"
                                       class="product-image">
                                        <img src="{{asset('storage/images/products') . '/' . $prod->media[0]->image}}" alt="product" style="width: 170px;height: 226px;object-fit: cover">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                        </div><!-- End .product-ratings -->
                                    </div><!-- !-- End .product-container -->
                                    <h2 class="product-title" style="height: 50px; overflow: hidden">
                                        <a href="{{route('product.list',['slug' => $prod->slug ,'id' => $prod->id])}}">{{$prod->name}}</a>
                                    </h2>
                                    <div class="price-box">
                                        <span class="product-price">{{number_format($prod->price)}} VND</span>

                                    </div><!-- End .price-box -->

                                    <div class="product-action">
                                        <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                            <span>Add to Wishlist</span>
                                        </a>

                                        <a href="{{route('cart.add',['id'=>$prod->id,'slug' => $prod->slug])}}"
                                           class="paction add-cart" title="Add to Cart" id="addCart">
                                            <span>Add to Cart</span>
                                        </a>

                                        <a href="#" class="paction add-compare" title="Add to Compare">
                                            <span>Add to Compare</span>
                                        </a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product-details -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .featured-proucts -->

                </div><!-- End .row -->

            </div><!-- End .col-lg-9 -->

            <aside class="sidebar-shop col-lg-3 order-lg-first">
                <div class="sidebar-wrapper">
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true"
                               aria-controls="widget-body-1">category</a>
                        </h3>

                        <div class="collapse show" id="widget-body-1">
                            <div class="widget-body">
                                <ul class="cat-list">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{route('product.list',['slug' => $category['slug'],'id' => $category['id']])}}">{{$category['name']}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                               aria-controls="widget-body-2">Price</a>
                        </h3>

                        <div class="collapse show" id="widget-body-2">
                            <div class="widget-body">
                                    @csrf
                                    <div class="price-slider-wrapper">
                                        <input type="text" name="price" id="price"><!-- End #price-slider -->
                                    </div><!-- End .price-slider-wrapper -->

                                    <div class="filter-price-action">
                                        <button type="submit" class="btn btn-primary" id="findPrice">Find</button>

                                        <div class="filter-price-text">
                                            <span id="filter-price-range"></span>
                                        </div><!-- End .filter-price-text -->
                                    </div><!-- End .filter-price-action -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                               aria-controls="widget-body-3">Size</a>
                        </h3>
                        <div class="collapse show" id="widget-body-3">
                            <div class="widget-body">
                                <ul class="config-size-list">
                                    @foreach($attribute as $attr)
                                        <li><a href="#" attr-id="{{$attr->id}}" class="attribute">{{$attr->size . ' - ' . $attr->type}}</a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->


                </div><!-- End .sidebar-wrapper -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
@stop
@section('script')
    <script type="text/javascript">
        $("#orderby").on('change',function (e) {
            console.log(e);
            var order = e.target.value;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('product.sort',['slug' => $ca['slug'],'id' => $ca['id']])}}",
                method: "POST",
                data:{order:order,_token:_token},
                success:function (result) {
                    $('.product-sort').html(result);
                }
            })
        })
        var _token = $('input[name="_token"]').val();
        $("#findPrice").on('click',function (e) {
            e.preventDefault();
            var price = $("#price").val();
            $.ajax({
                url:"{{route('home.search.price',['slug' => $ca['slug'],'id' => $ca['id']])}}",
                method: "POST",
                data:{
                    price:price,
                    _token:_token
                },
                success:function (result) {
                    $('.product-sort').html(result);
                }
            })
        })
        $(document).on('click','.attribute',function () {
            let attr = $(this).attr('attr-id');
            console.log(_token);
            $.ajax({
                url: '{{route('home.search.attribute',['slug' => $ca['slug'], 'id' => $ca['id']])}}',
                type: 'POST',
                data:{
                    attr: attr,
                    _token: _token
                },
                success:function (result) {
                    $('.product-sort').html(result);
                },
                error: function () {
                    alert('Something wrong please try again');
                }
            })
        })
    </script>
    @endsection
