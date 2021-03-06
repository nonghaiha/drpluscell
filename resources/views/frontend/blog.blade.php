@extends('frontend.layout.master')
@section('title','Porto Blog')
@section('main')

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
@stop
