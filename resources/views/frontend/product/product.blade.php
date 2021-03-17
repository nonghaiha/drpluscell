@extends('frontend.layout.master')
@section('title',''.$produ->name.'')
@section('main')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('frontend.layout')}}"><i class="icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Headsets</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-single-container product-single-default">
                        <div class="row">
                            <div class="col-lg-7 col-md-6 product-single-gallery">
                                <div class="product-slider-container product-item">
                                    <div class="product-single-carousel owl-carousel owl-theme">
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                 src="{{asset('storage/images/products') . '/' . $produ->media[0]->image}}"
                                                 data-zoom-image="{{asset('storage/images/products') . '/' . $produ->media[0]->image}}"/>
                                        </div>

                                    </div>
                                    <!-- End .product-single-carousel -->
                                    <span class="prod-full-screen">
                                            <i class="icon-plus"></i>
                                        </span>
                                </div>
                                <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>

                                    <div class="col-3 owl-dot" style="display: flex">
                                        @foreach($produ->media as $media)
                                            <img src="{{asset('storage/images/products') . '/' . $media->image}}"
                                                 style="object-fit: cover"/>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!-- End .col-lg-7 -->

                            <div class="col-lg-5 col-md-6">
                                <div class="product-single-details">
                                    <h1 class="product-title">{{$produ->name}}</h1>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                        </div><!-- End .product-ratings -->

                                        <a href="#" class="rating-link">( 6 Reviews )</a>
                                    </div><!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">{{number_format($produ->price)}} VND</span>
                                    </div><!-- End .price-box -->

                                    <div class="product-desc">
                                        <p>{!! $produ->content !!}</p>
                                    </div><!-- End .product-desc -->


                                    <div class="product-action product-all-icons">
                                        <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" type="text">
                                        </div><!-- End .product-single-qty -->

                                        <a href="{{route('cart.add',['id'=>$produ->id])}}" class="paction add-cart"
                                           title="Add to Cart">
                                            <span>Add to Cart</span>
                                        </a>
                                        <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                            <span>Add to Wishlist</span>
                                        </a>
                                        <a href="#" class="paction add-compare" title="Add to Compare">
                                            <span>Add to Compare</span>
                                        </a>
                                    </div><!-- End .product-action -->

                                </div><!-- End .product-single-details -->
                            </div><!-- End .col-lg-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-single-container -->

                </div><!-- End .col-lg-9 -->

                <div class="sidebar-overlay"></div>
                <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
                <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="widget widget-info">
                            <ul>
                                <li>
                                    <i class="icon-shipping"></i>
                                    <h4>FREE<br>SHIPPING</h4>
                                </li>
                                <li>
                                    <i class="icon-us-dollar"></i>
                                    <h4>100% MONEY<br>BACK GUARANTEE</h4>
                                </li>
                                <li>
                                    <i class="icon-online-support"></i>
                                    <h4>ONLINE<br>SUPPORT 24/7</h4>
                                </li>
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget widget-banner">
                            <div class="banner banner-image">
                                <a href="#">
                                    <img src="{{asset('frontend/assets/images/banners/banner-sidebar.jpg')}}"
                                         alt="Banner Desc">
                                </a>
                            </div><!-- End .banner -->
                        </div><!-- End .widget -->

                        <div class="widget widget-featured">
                            <h3 class="widget-title">Featured Products</h3>

                            <div class="widget-body">
                                <div class="owl-carousel widget-featured-products">
                                    <div class="featured-col">
                                        @foreach($feature_product1 as $feature1)
                                            <div class="product product-sm">
                                                <figure class="product-image-container">
                                                    <a href="{{route('product.list',['id' => $feature1['id'], 'slug' => $feature1['slug']])}}" class="product-image">
                                                        <img
                                                            src="{{asset('storage/images/products') . '/' . $feature1->media[0]->image}}"
                                                            alt="product"
                                                            style="width: 80px;height: 80px;object-fit: cover">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h2 class="product-title">
                                                        <a href="{{route('product.list',['id' => $feature1['id'], 'slug' => $feature1['slug']])}}">{{$feature1->name}}</a>
                                                    </h2>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:80%"></span>
                                                            <!-- End .ratings -->
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">{{number_format($feature1->price)}} VND</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        @endforeach
                                    </div><!-- End .featured-col -->
                                </div><!-- End .widget-featured-slider -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .widget -->
                    </div>
                </aside><!-- End .col-md-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="featured-section">
            <div class="container">
                <h2 class="carousel-title">Featured Products</h2>

                <div class="featured-products owl-carousel owl-theme owl-dots-top">
                    @foreach($feature_product2 as $feature2)
                        <div class="product">
                            <figure class="product-image-container">
                                <a href="{{route('product.list',['id' => $feature2['id'], 'slug' => $feature2['slug']])}}" class="product-image">
                                    <img src="{{asset('storage/images/products') . '/' . $feature2->media[0]->image}}" alt="product" style="width: 255px;height: 125px; object-fit: cover">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <h2 class="product-title">
                                    <a href="{{route('product.list',['id' => $feature2['id'], 'slug' => $feature2['slug']])}}">{{$feature2->name}}</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">{{number_format($feature2->price)}} VND</span>
                                </div><!-- End .price-box -->

                                <div class="product-action">
                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>

                                    <a href="{{route('cart.add',['id' => $feature2->id])}}" class="paction add-cart" title="Add to Cart">
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
            </div><!-- End .container -->
        </div><!-- End .featured-section -->
    </main><!-- End .main -->
@stop
