@include('frontend.header')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- ##### Single Blog Area Start ##### -->
        <div class="single-blog-wrapper section-padding-0-100 mt-5">
            <div class="container">
                <div class="row mx-auto mt-3">
                    <!-- ##### Post Content Area ##### -->
                    <div class="col-12 col-lg-8 mx-auto">
                        <!-- Single Blog Area  -->
                        <div class="single-blog-area blog-style-2 mb-50">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="line"></div>
                                <img src="{{asset('uploads/images/'.$post->images)}}" alt="">
                                <h2 style="margin-top:10px"><a href="#" class="post-headline mb-0">{{$post->title}}</a></h2>
                                <div class="post-meta mb-1">
                                    <p>By <a href="#">{{$post->user->name}}</a></p>
                                    <p>10 comments</p>
                                </div>
                                <div class="post-meta mt-0">
                                    <p> <a href="{{ route('singlepost',$post->id) }}">{{$post->sub_title}}</a></p>
                                </div>
                                <p>{!! html_entity_decode($post->description)!!}</p>
                            </div>
                        </div>



                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix mt-20 pt-2 border-top">
                            <h5 class="title">Comments</h5>

                            <ol>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex bg-light p-3">
                                        <!-- Comment Author -->
                                        <div class="comment-author p-0 m-0">
                                            <img src="{{asset('uploads/images/'.$post->images)}}" alt="author" style="height: 60px; width:60px">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="post-date">March 12</a>
                                            <p><a href="#" class="post-author">William James</a></p>
                                            <p>Efficitur lorem sed tempor. Integer aliquet tempor cursus</p>
                                            <a href="#" class="comment-reply">Reply</a>
                                        </div>
                                    </div>
                                    <ol class="children">
                                        <li class="single_comment_area">
                                            <!-- Comment Content -->
                                            <div class="comment-content d-flex">
                                                <!-- Comment Author -->
                                                <div class="comment-author p-0 m-0">
                                                    <img src="{{asset('uploads/images/'.$post->images)}}" alt="author" style="height: 60px; width:60px">
                                                </div>
                                                <!-- Comment Meta -->
                                                <div class="comment-meta">
                                                    <a href="#" class="post-date">March 12</a>
                                                    <p><a href="#" class="post-author">Anal Cimiy</a></p>
                                                    <p>
                                                        Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>
                                                    <a href="#" class="comment-reply">Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>

                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex bg-light p-3">
                                        <!-- Comment Author -->
                                        <div class="comment-author  p-0 m-0">
                                            <img src="{{asset('uploads/images/'.$post->images)}}" alt="author" style="height: 60px; width:60px">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="post-date">March 12</a>
                                            <p><a href="#" class="post-author">Roboart Jemas</a></p>
                                            <p>Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>
                                            <a href="#" class="comment-reply">Reply</a>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>

                        <div class="post-a-comment-area mt-70">
                            <h5>Leave a reply</h5>
                            <!-- Reply Form -->
                            <form action="{{route('contactus')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="name" id="name" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="email" name="email" id="email" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group">
                                            <input type="text" name="subject" id="subject" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="description" id="message" required></textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn original-btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- ##### Sidebar Area ##### -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="post-sidebar-area">

                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">
                                <h3 class="title subscribe-title">Subscribe to my newsletter</h3>
                                <div class="widget-content">
                                    <form action="#" class="newsletterForm">
                                        <input type="email" name="email" id="subscribesForm" placeholder="Your e-mail here">
                                        <button type="submit" class="btn original-btn">Subscribe</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">
                                {{-- <h3 class="title">Advertisement</h3> --}}
                                <a href="#"><img src="{{asset("frontend/img/add.gif")}}" alt="" width="100%"></a>
                            </div>

                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">
                                <h3 class="title">Latest Posts</h3>

                                <div class="widget-content">
                                    @foreach ($posts as $post)
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{asset('uploads/images/'.$post->images)}}" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">

                                            <h4 class="p-0 mb-1" style="line-height: .7;"><a href="#" class="post-headline mb-0">A sunday in the park by Crypto</a></h4>
                                            <div class="post-meta m-0">
                                                <p><a href="#" style="font-size: 10px;">12 March</a></p>
                                            </div>
                                            <div class="post-meta m-0">
                                                <p style="font-size: 9px; color:#444">By <a href="#" style="font-size: 8px; color:#444">Crypto Detector</a>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>

                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">
                                <h5 class="title">Tags</h5>
                                <div class="widget-content">
                                    <ul class="tags">
                                        <li><a href="#">design</a></li>
                                        <li><a href="#">fashion</a></li>
                                        <li><a href="#">travel</a></li>
                                        <li><a href="#">music</a></li>
                                        <li><a href="#">party</a></li>
                                        <li><a href="#">video</a></li>
                                        <li><a href="#">photography</a></li>
                                        <li><a href="#">adventure</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.footer')
