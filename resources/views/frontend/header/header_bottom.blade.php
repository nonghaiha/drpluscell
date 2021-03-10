<div class="header-bottom sticky-header">
    <div class="container">
        <nav class="main-nav">
            <ul class="menu sf-arrows">
                <li class="active"><a href="{{route('frontend.layout')}}">Home</a></li>
                <li>
                    <a href="#" class="sf-with-ul">Categories</a>
                    <div class="megamenu megamenu-fixed-width">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="menu-title">
                                            @foreach($categories as $cat)
                                            <a href="{{route('product.list',['id'=> $cat->id , 'slug' => $cat->slug])}}">{{$cat->name}}</a>
                                            @endforeach
                                        </div>
                                    </div><!-- End .col-lg-6 -->

                                </div><!-- End .row -->
                            </div><!-- End .col-lg-8 -->

                        </div>
                    </div><!-- End .megamenu -->
                </li>
                <li class="megamenu-container">
                    <a href="product.html" class="sf-with-ul">Products</a>
                    <div class="megamenu">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="menu-title">
                                            <a href="#">Variations</a>
                                        </div>
                                        <ul>
                                            <li><a href="product.html">Horizontal Thumbnails</a></li>
                                            <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                            <li><a href="product.html">Inner Zoom</a></li>
                                            <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                            <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                        </ul>
                                    </div><!-- End .col-lg-4 -->
                                    <div class="col-lg-4">
                                        <div class="menu-title">
                                            <a href="#">Variations</a>
                                        </div>
                                        <ul>
                                            <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                            <li><a href="product-simple.html">Simple Product</a></li>
                                            <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                        </ul>
                                    </div><!-- End .col-lg-4 -->
                                    <div class="col-lg-4">
                                        <div class="menu-title">
                                            <a href="#">Product Layout Types</a>
                                        </div>
                                        <ul>
                                            <li><a href="product.html">Default Layout</a></li>
                                            <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                            <li><a href="product-full-width.html">Full Width Layout</a></li>
                                            <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                            <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                            <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                        </ul>
                                    </div><!-- End .col-lg-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .col-lg-8 -->
                            <div class="col-lg-4">
                                <div class="banner">
                                    <a href="#">
                                        <img class="product-promo" src="assets/images/menu-banner.jpg" alt="Menu banner">
                                    </a>
                                </div><!-- End .banner -->
                            </div><!-- End .col-lg-4 -->
                        </div>
                    </div><!-- End .megamenu -->
                </li>
                <li>
                    <a href="#" class="sf-with-ul">Pages</a>

                    <ul>
                        <li><a href="cart.html">Shopping Cart</a></li>
                        <li><a href="#">Checkout</a>
                            <ul>
                                <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                <li><a href="checkout-review.html">Checkout Review</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dashboard</a>
                            <ul>
                                <li><a href="dashboard.html">Dashboard</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#">Blog</a>
                            <ul>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single.html">Blog Post</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#" class="login-link">Login</a></li>
                        <li><a href="forgot-password.html">Forgot Password</a></li>
                    </ul>
                </li>
                <li><a href="#" class="sf-with-ul">Features</a>
                    <ul>
                        <li><a href="#">Header Types</a></li>
                        <li><a href="#">Footer Types</a></li>
                    </ul>
                </li>
                <li class="float-right"><a href="#">Buy Porto!</a></li>
                <li class="float-right"><a href="#">Special Offer!</a></li>
            </ul>
        </nav>
    </div><!-- End .header-bottom -->
</div><!-- End .header-bottom -->
