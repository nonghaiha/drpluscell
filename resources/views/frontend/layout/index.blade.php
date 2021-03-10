@extends('frontend.layout.master')
@section('title','Home')
@section('main')
@include('frontend.slide')
@include('frontend.banner')
@include('frontend.product.product1')
	 <main class="main">
            <div class="info-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-earphones-alt"></i>

                                <div class="feature-box-content">
                                    <h3>Customer Support<span>Need Assistence?</span></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-credit-card"></i>

                                <div class="feature-box-content">
                                    <h3>secured payment <span>Safe & Fast</span></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.consectetur adipiscing elit. </p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-action-undo"></i>

                                <div class="feature-box-content">
                                    <h3>Returns <span>Easy & Free</span></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .info-section -->

            <div class="promo-section" style="background-image: url("")>
                <div class="container">
                    <h3>fashion show collection</h3>
                    <a href="" class="btn btn-dark">Shop Now</a>
                </div><!-- End .container -->
            </div><!-- End .promo-section -->

            <div class="partners-container">
                <div class="container">
                    <div class="partners-carousel owl-carousel owl-theme">
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/1.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/2.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/3.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/4.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/5.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/2.png" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="{{ url('/frontend') }}/assets/images/logos/1.png" alt="logo">
                        </a>
                    </div><!-- End .partners-carousel -->
                </div><!-- End .container -->
            </div><!-- End .partners-container -->

            <div class="blog-section">
                <div class="container">
                    <h2 class="h3 title text-center">From the Blog</h2>

                    <div class="blog-carousel owl-carousel owl-theme">
                        <article class="entry">
                            <div class="entry-media">
                                <a href="{{route('single')}}">
                                    <img src="{{ url('/frontend') }}/assets/images/blog/home/post-1.png" alt="Post">
                                </a>
                                <div class="entry-date">29<span>Now</span></div><!-- End .entry-date -->
                            </div><!-- End .entry-media -->

                            <div class="entry-body">
                                <h3 class="entry-title">
                                    <a href="{{route('single')}}">New Collection</a>
                                </h3>
                                <div class="entry-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has...</p>

                                    <a href="{{route('single')}}" class="btn btn-dark">Read More</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <div class="entry-media">
                                <a href="{{route('single')}}">
                                    <img src="{{ url('/frontend') }}/assets/images/blog/home/post-2.png" alt="Post">
                                </a>
                                <div class="entry-date">30 <span>Now</span></div><!-- End .entry-date -->
                            </div><!-- End .entry-media -->

                            <div class="entry-body">
                                <h3 class="entry-title">
                                    <a href="{{route('single')}}">Fashion Trends</a>
                                </h3>
                                <div class="entry-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has...</p>

                                    <a href="{{route('single')}}" class="btn btn-dark">Read More</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <div class="entry-media">
                                <a href="{{route('single')}}">
                                    <img src="{{ url('/frontend') }}/assets/images/blog/home/post-3.png" alt="Post">
                                </a>
                                <div class="entry-date">28 <span>Now</span></div><!-- End .entry-date -->
                            </div><!-- End .entry-media -->

                            <div class="entry-body">
                                <h3 class="entry-title">
                                    <a href="{{route('single')}}">Women Fashion</a>
                                </h3>
                                <div class="entry-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has...</p>

                                    <a href="{{route('single')}}" class="btn btn-dark">Read More</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .blog-carousel -->
                </div><!-- End .container -->
            </div><!-- End .blog-section -->
        </main><!-- End .main -->
@stop
