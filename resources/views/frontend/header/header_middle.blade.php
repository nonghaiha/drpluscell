
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="{{route('frontend.layout')}}" class="logo">
                            <img src="{{ url('/frontend') }}/assets/images/logo.png" alt="Porto Logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="{{route('home.search')}}" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                    <!-- End .select-custom -->
                                    <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div><!-- End .headeer-center -->

                    <div class="header-right">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>
                        <div class="header-contact">
                            <span>Call us now</span>
                            <a href="tel:#"><strong>+123 5678 890</strong></a>
                        </div><!-- End .header-contact -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <span class="cart-count">{{$carts->total_quantity}}</span>
                            </a>

                            <div class="dropdown-menu" >
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-products">
                                        @foreach($carts->items as $it)
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="#">{{$it['name']}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{$it['quantity']}}</span>
                                                    X {{number_format($it['price'])}} VNĐ
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="{{ url('/frontend') }}/assets/images/products/cart/product-1.jpg" alt="product">
                                                </a>
                                                <a href="{{route('cart.remove',['id'=>$it['id']])}}" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                            </figure>
                                        </div><!-- End .product -->
                                        @endforeach
                                    </div><!-- End .cart-product -->
                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price">{{number_format($carts->total_price)}} VNĐ</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{route('cart.process')}}" class="btn">View Cart</a>
                                        <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
