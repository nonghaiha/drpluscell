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
                <li>
                    <a href="#" class="sf-with-ul">Pages</a>

                    <ul>
                        <li><a href="{{route('cart.process')}}">Shopping Cart</a></li>
                        <li><a href="{{route('about.index')}}">About Us</a></li>
                        <li><a href="{{route('blog')}}">Blog</a>
                        </li>
                        <li><a href="{{route('contact.index')}}">Contact Us</a></li>
                        <li><a href="{{route('home.login')}}" >Login</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div><!-- End .header-bottom -->
</div><!-- End .header-bottom -->
