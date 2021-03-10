@extends('frontend.layout.master')
@section('title','Blog')
@section('main')
 <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <article class="entry single">
                            <div class="entry-media">
                                <div class="entry-slider owl-carousel owl-theme owl-theme-light">
                                    <img src="{{url('frontend')}}/assets/images/blog/post-1.jpg" alt="Post">
                                    <img src="{{url('frontend')}}/assets/images/blog/post-2.jpg" alt="Post">
                                    <img src="{{url('frontend')}}/assets/images/blog/post-3.jpg" alt="Post">
                                </div><!-- End .entry-slider -->
                            </div><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-date">
                                    <span class="day">22</span>
                                    <span class="month">Jun</span>
                                </div><!-- End .entry-date -->

                                <h2 class="entry-title">
                                    Post Format - Image Gallery
                                </h2>

                                <div class="entry-meta">
                                    <span><i class="icon-calendar"></i>June 22, 2018</span>
                                    <span><i class="icon-user"></i>By <a href="#">Admin</a></span>
                                    <span><i class="icon-folder-open"></i>
                                        <a href="#">Haircuts & hairstyles</a>,
                                        <a href="#">Fashion trends</a>,
                                        <a href="#">Accessories</a>
                                    </span>
                                </div><!-- End .entry-meta -->

                                <div class="entry-content">
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula.</p>
                                    <p>Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula.
                                    Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. Nulla aliquet turpis eget sodales scelerisque. Ut accumsan rhoncus sapien a dignissim. Sed vel ipsum nunc. Aliquam erat volutpat. Donec et dignissim elit. Etiam condimentum, ante sed rutrum auctor, quam arcu consequat massa, at gravida enim velit id nisl.</p>
                                    <p>Nullam non felis odio. Praesent aliquam magna est, nec volutpat quam aliquet non. Cras ut lobortis massa, a fringilla dolor. Quisque ornare est at felis consectetur mollis. Aliquam vitae metus et enim posuere ornare. Praesent sapien erat, pellentesque quis sollicitudin eget, imperdiet bibendum magna. Aenean sit amet odio est.</p>
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris quis est lobortis odio dignissim rutrum. Pellentesque blandit lacinia diam, a tincidunt felis tempus eget.</p>
                                    <p>Donec egestas metus non vehicula accumsan. Pellentesque sit amet tempor nibh. Mauris in risus lorem. Cras malesuada gravida massa eget viverra. Suspendisse vitae dolor erat. Morbi id rhoncus enim. In hac habitasse platea dictumst. Aenean lorem diam, venenatis nec venenatis id, adipiscing ac massa. Nam vel dui eget justo dictum pretium a rhoncus ipsum. Donec venenatis erat tincidunt nunc suscipit, sit amet bibendum lacus posuere. Sed scelerisque, dolor a pharetra sodales, mi augue consequat sapien, et interdum tellus leo et nunc. Nunc imperdiet eu libero ut imperdiet.</p>
                                    <p>Nunc varius ornare tortor. In dignissim quam eget quam sodales egestas. Nullam imperdiet velit feugiat, egestas risus nec, rhoncus felis. Suspendisse sagittis enim aliquet augue consequat facilisis. Nunc sit amet eleifend tellus. Etiam rhoncus turpis quam. Vestibulum eu lacus mattis, dignissim justo vel, fermentum nulla. Donec pharetra augue eget diam dictum, eu ullamcorper arcu feugiat.</p>
                                    <p>Proin ut ante vitae magna cursus porta. Aenean rutrum faucibus augue eu convallis. Phasellus condimentum elit id cursus sodales. Vivamus nec est consectetur, tincidunt augue at, tempor libero.</p> 
                                </div><!-- End .entry-content -->

7
                                <div class="entry-author">
                                    <h3><i class="icon-user"></i>Author</h3>

                                    <figure>
                                        <a href="#">
                                            <img src="assets/images/blog/author.jpg" alt="author">
                                        </a>
                                    </figure>

                                    <div class="author-content">
                                        <h4><a href="#">John Doe</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab officia culpa corporis, quidem placeat minima unde vel veniam laboriosam et animi, inventore delectus, officiis doloribus ex amet illum ea suscipit!</p>
                                    </div><!-- End .author.content -->
                                </div><!-- End .entry-author -->

                                <div class="comment-respond">
                                    <h3>Leave a Reply</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>

                                    <form action="#">
                                        <div class="form-group required-field">
                                            <label>Comment</label>
                                            <textarea cols="30" rows="1" class="form-control" required></textarea>
                                        </div><!-- End .form-group -->

                                        <div class="form-group required-field">
                                            <label>Name</label>
                                            <input type="text" class="form-control" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group required-field">
                                            <label>Email</label>
                                            <input type="email" class="form-control" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="url" class="form-control">
                                        </div><!-- End .form-group -->
                                        
                                        <div class="form-group-custom-control mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="save-name">
                                                <label class="custom-control-label" for="save-name">Save my name, email, and website in this browser for the next time I comment.</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-group-custom-control -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-primary">Post Comment</button>
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div><!-- End .comment-respond -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
@stop