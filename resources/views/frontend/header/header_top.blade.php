            <div class="header-top">
                <div class="container">

                    <div class="header-right">
                        <p class="welcome-msg">Welcome to Drpluscell! </p>

                        <div class="header-dropdown dropdown-expanded">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="{{route('home.account')}}">MY ACCOUNT</a></li>
                                    <li><a href="">DAILY DEAL</a></li>
                                    <li><a href="#">MY WISHLIST </a></li>
                                    <li><a href="{{route('blog')}}">BLOG</a></li>
                                    <li><a href="{{route('contact.index')}}">Contact</a></li>
                                    @if(Auth::guard('customer')->check())
                                    <li>Chào bạn {{Auth::guard('customer')->user()->name}}</li>
                                    <li><a href="{{route('home.logout')}}">LOG OUT</a></li>
                                    @else
                                    <li><a href="{{route('home.login')}}">LOG IN</a></li>
                                    @endif
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->
