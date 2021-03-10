 <div class="featured-products-section carousel-section">
                <div class="container">
                    <h2 class="h3 title mb-4 text-center">Featured Products</h2>

                    <div class="featured-products owl-carousel owl-theme">
                        @foreach($product as $model)
                        <div class="product">
                            <figure class="product-image-container">
                                <a href="{{route('product.list',['slug' => $model->slug ,'id' => $model->id])}}" class="product-image">
                                    <img src="{{$model->image}}" alt="product" style="height: 400px" >
                                </a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview">Quickview</a>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <h2 class="product-title" style="height: 50px">
                                    <a href="{{route('product.list',['slug' => $model->slug ,'id' => $model->id])}}">{{$model->name}}</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">${{number_format($model->price)}}</span>

                                </div><!-- End .price-box -->

                                <div class="product-action">
                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>

                                    <a href="{{route('cart.add',['id'=>$model->id,'slug'=>$model->slug])}}" class="paction add-cart" title="Add to Cart" id="cartCheck">
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
            </div><!-- End .featured-proucts-section -->

            <div class="mb-5"></div><!-- margin -->

            <div class="carousel-section">
                <div class="container">
                    <h2 class="h3 title mb-4 text-center">New Arrivals</h2>

                    <div class="new-products owl-carousel owl-theme">
                        @foreach($produc as $mode)
                        <div class="product">
                            <figure class="product-image-container">
                                <a href="{{route('product.list',['slug' => $mode->slug ,'id' => $mode->id])}}" class="product-image">
                                    <img src="{{$mode->image }}" alt="product" style="height: 400px">
                                </a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview">Quickview</a>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <h2 class="product-title" style="height: 50px">
                                    <a href="{{route('product.list',['slug' => $mode->slug ,'id' => $mode->id])}}">{{$mode->name}}</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">${{number_format($mode->price)}}</span>
                                </div><!-- End .price-box -->

                                <div class="product-action">
                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>

                                    <a href="{{route('cart.add',['id'=>$mode->id,'slug'=>$mode->slug])}}" class="paction add-cart" title="Add to Cart" id="cartCheck">
                                        <span>Add to Cart</span>
                                    </a>

                                    <a href="#" class="paction add-compare" title="Add to Compare">
                                        <span>Add to Compare</span>
                                    </a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product-details -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .news-proucts -->
                </div><!-- End .container -->
            </div><!-- End .carousel-section -->

            <div class="mb-5"></div><!-- margin -->
