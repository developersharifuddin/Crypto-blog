@include('frontend.header')

<style>
    .user .live-link{
            font-weight: normal !important;
            font-size: 11px;
        }
    </style>
 <style>
    .fa-comment{
        display: none;
        color: rgb(104, 101, 241);
        font-size: 19px;
    }
    .fa-comment-o{
        display: block;
        color: rgb(104, 101, 241);
        font-size: 19px;
    }
    .fa-heart{
        display: none;
        color: rgb(255, 0, 166);
        font-size: 19px;
    }
    .fa-heart-o{
        display: block;
        color: rgb(255, 0, 166);
        font-size: 19px;
    }
    .comment-box{
        display: none;
        float:left;
        width: 100%;
        z-index: 999;
        overflow: visible;
    }
    .comment-box input{
        height: 38px;
        overflow:visible;
        font-size: 12px;
        color:555;
    }
</style>
       <script>
            $(document).ready(function(){
                $('.fa-comment-o').on('click', function(){
                    // var r = $(this).attr('class');
                    // alert(r);
                    var numVal = parseInt($(".value").text());

                  $('.comment-box').css('display', 'block');

                  $(function() {
                            //hang on event of form with id=myform
                            $(".comment-form").submit(function(e) {
                                //prevent Default functionality
                                e.preventDefault();

                                if($('.my-comment').val() == ''){
                                        alert('Please Write a comment first ?');
                                    }else{
                                         $('.comment-form')[0].reset();
                                         $('.comment-box').css('display', 'none');

                                        $('.fa-comment').css('display', 'block');
                                        $('.fa-comment-o').css('display', 'none');
                                        ++numVal;
                                        $(".value").text(numVal);
                                        // alert("You Comment this post" +" "+ numVal);
                                    }
                                //get the action-url of the form
                                var actionurl = e.currentTarget.action;
                                $.ajax({
                                        url: actionurl,
                                        type: 'post',
                                        dataType: 'application/json',
                                        data: $("#myform").serialize(),
                                        success: function(data) {
                                           $('.comment-form')[0].reset();
                                        }
                                });
                            });
                        });
                });



                $('.fa-comment').on('click', function(){

                  $('.comment-box').css('display', 'block');

                });

                $('.fa-heart-o').on('click', function(){
                    var love = parseInt($(".loved").text());
                  $('.fa-heart').css('display', 'block');
                  $('.fa-heart-o').css('display', 'none');
                  ++love;
                    $(".loved").text(love);
                });

                $('.fa-heart').on('click', function(){
                  var love = parseInt($(".loved").text());
                  $('.fa-heart-o').css('display', 'block');
                  $('.fa-heart').css('display', 'none');
                  --love;
                    $(".loved").text(love);
                });


                // $('.runHome').on('click', myfunction);
                // function myfunction() {
                //     $(this).number(++runHome);
                // <div class="runHome">0</div>
                // <button>RunsHome</button>

             });
          </script>


    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-50 clearfix">
        <div class="container-fluid mb-md-5">
        <div class="container px-0 px-md-auto">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4 mt-0">
                    <div class="single-blog-area clearfix mb-50">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="post-meta mt-0">
                                <p><a href="{{ url('/') }}">Admin Cripto Currency</a></p>
                            </div>
                            <div class="line"></div>
                            <div class="post-meta mt-0">
                                        <p>By <a href="{{ url('/') }}">Shifat ullah</a></p>
                                    </div>
                            <h4><a href="{{ url('/') }}" class="post-headline">Welcome to this Cripto Detector9 blog</a></h4>
                            <p>Curabitur venenatis efficitur lorem sed tempor.
                                Integer aliquet tempor cursus
                                  dolor id ultricies dictum</p>
                            <a href="{{ url('/') }}" class="btn original-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 mt-0">
                <div class="hero-area">
                    <!-- Hero Slides Area -->
                    <div class="hero-slides owl-carousel d-sm-block d-md-non py-2 py-md-3">
                @foreach ($posts as $post)
                        <!-- Single Slide -->
                        <div class="single-hero-slide bg-img" style="background-image: url({{asset('uploads/images/'.$post->images)}}); background-size: contain; background-repeat: no-repeat;">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-12">
                                        <div class="slide-content text-center">
                                            <div class="post-tag">
                                                <a href="{{ route('singlepost',$post->id) }}" data-animation="fadeInUp">Cripto Detector9</a>
                                            </div>
                                            <h2 data-animation="fadeInUp" data-delay="250ms"><a href="{{ route('singlepost',$post->id) }}">Take a look at last night’s party!</a></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>








    <div class="container px-0 px-md-auto">
        <div class="row justify-content-center mx-auto">
            <!-- Single Blog Area -->
            <div class="col-sm-12 col-lg-7 col-lg-7 mt-0 mr-lg-5">
                <p class="mb-2" style=" text-align:justify mt-5"><b>Our Latest Blog Post </b>
                </p>
                @foreach ($posts as $post)
                    <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp pb-3 pt-2 mb-0 mb-md-4 border-bottom " data-wow-delay="0.2s" data-wow-duration="1000ms">
                        <div class="row align-items-start">
                        <a href="{{ route('singlepost',$post->id) }}">
                            <div class="col-12 col-md-6">
                                <div class="post-user-append pb-3 pb-md-0 my-auto"></div>
                                <div class="single-blog-thumbnail text:right">
                                    <img src="{{asset('uploads/images/'.$post->images)}}" alt="" style="max-height: 180px; width:auto">
                                    <div class="post-date d-none">
                                        <a href="{{ route('singlepost',$post->id) }}">12 <span>march</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Blog Content -->
                                <div class="single-blog-content">
                                <div class="c">
                                    <div class="post-head col-12 col-md-12 px-0 pt-2">
                                        <div class="post-user-profile d-flex my-auto">
                                        <div class="px-0">
                                            <a href="{{ route('singlepost',$post->id) }}"><img src="{{asset('frontend/img/logo.png')}}" alt="" height="60px" style="border-radius: 50%; height: 45px; width: 45px;"></a>

                                        </div>
                                        <div class="px-2 my-auto">
                                            <div class="user" style="line-height: .4;">
                                                <h5 class="post-tag font-weight-700"><a href="{{ route('singlepost',$post->id) }}" style="font-weight: 700 !important">Admin Cripto Currency</a></h5>
                                                <a href="{{ route('singlepost',$post->id) }}" class="live-link">Post <span>09:20 Am</span></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                </div>

                                    <h4 class="pb-0 mb-0 mt-2"><a href="{{ route('singlepost',$post->id) }}" class="post-headline">{!! Str::limit($post->title, 22, ' ...') !!}</a></h4>
                                    <div class="post-meta mt-0">
                                        <p>By <a href="{{ route('singlepost',$post->id) }}">{!! Str::limit($post->sub_title, 22, ' ...') !!}</a></p>
                                    </div>
                                    <p class="mb-2" style=" text-align:justify">{!! Str::limit($post->description, 100, ' ...') !!}</p>
                                    <div class="post-meta">
                                        <p class="d-none">By <a href="{{ route('singlepost',$post->id) }}">james smith</a></p>
                                        <p class="w-50 d-flex" style="float:left"> <i class="fa fa-comment"></i> <i class="fa fa-comment-o"></i>
                                            <span class="my-auto px-1"><span class="value">30</span>k Comments </span>
                                            </p>
                                        <p class="w-50 d-flex" style="float:right"> <i class="fa fa-heart"></i> <i class="fa fa-heart-o"></i> <span class="my-auto px-1">
                                            <span class="loved">500</span>k Loves</span></p>
                                        <br>
                                        <div class="comment-box mt-2" style="display: none">
                                            <form action="{{ route('singlepost',$post->id) }}" method="post" class="comment-form">
                                            <input type="text" name="comment" class="form-control my-comment"/>
                                            <input class="btn btn-sm btn-info mt-1 text-white float-right sent-comment" type="submit" value="Send" style="height: 30px;"/>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    @endforeach
            </div>

            <div class="col-sm-12 col-lg-4 col-lg-4">
                <div class="post-sidebar-area">

                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <form action="#" class="search-form">
                            <input type="search" name="search" id="searchForm" placeholder="Search">
                            <input type="submit" value="submit">
                        </form>
                    </div>

                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title subscribe-title">Subscribe to my newsletter</h5>
                        <div class="widget-content">
                            <form action="#" class="newsletterForm">
                                <input type="email" name="email" id="subscribesForm" placeholder="Your e-mail here">
                                <button type="submit" class="btn original-btn">Subscribe</button>
                            </form>
                        </div>
                    </div>

                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title">Advertisement</h5>
                        <a href="#"><img src="img/post/post7.webp" alt=""></a>
                    </div>

                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title">Latest Posts</h5>

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










<!-- order-last order-md-0 -->
        <div class="container pl-0 pr-0">
            <div class="row justify-content-center mx-auto">
                <div class="col-12 col-md-7 pr-lg-5"> <br><br>
                    <p class="mb-2" style=" text-align:justify mt-5"><b>Our Latest Blog Post </b>
                        </p>



                 @foreach ($posts as $post)
                    <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1000ms">
                        <div class="row mx-auto justify-content-center  pl-0 pr-0">
                            <div class="pl-0 pr-0">

                                <!-- <div class="col-12 col-md-12 d-flex px-0 post mb-3">
                                    <div class="px-0">
                                        <a href="{{ route('singlepost',$post->id) }}"><img src="img/logo.jpeg" alt="" height="60px" style="border-radius: 50%; height: 45px; width: 45px;"></a>

                                    </div>
                                    <div class="px-2 my-auto">
                                        <div class="user" style="line-height: .4;">
                                            <h5 class="post-tag"><a href="{{ route('singlepost',$post->id) }}">Admin Cripto Currency</a></h5>
                                            <a href="{{ route('singlepost',$post->id) }}" class="live-link">Post <span>09:20 Am</span></a>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="single-blog-thumbnail">
                                    <img src="{{asset('uploads/images/'.$post->images)}}" alt="">
                                    <div class="post-date">
                                        <a href="{{ route('singlepost',$post->id) }}">10 <span>march</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-10  pl-0 pr-0">
                                <!-- Blog Content -->
                                <!-- Blog Content -->
                                <div class="single-blog-content mt-3">

                                    <div class="col-12 col-md-12 d-flex px-0 post">
                                        <div class="px-0">
                                            <a href="{{ route('singlepost',$post->id) }}"><img src="{{asset('frontend/img/logo.png')}}" alt="" height="60px" style="border-radius: 50%; height: 45px; width: 45px;"></a>

                                        </div>
                                        <div class="px-2 my-auto">
                                            <div class="user" style="line-height: .4;">
                                                <h5 class="post-tag"><a href="{{ route('singlepost',$post->id) }}">Admin Cripto Currency</a></h5>
                                                <a href="{{ route('singlepost',$post->id) }}" class="live-link">Post <span>09:20 Am</span></a>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="pb-0 mb-0 mt-2"><a href="{{ route('singlepost',$post->id) }}" class="post-headline">Party people in the house</a></h4>
                                    <div class="post-meta mt-0">
                                        <p>By <a href="{{ route('singlepost',$post->id) }}">james smith</a></p>
                                    </div>
                                    <p class="mb-2" style=" text-align:justify">Curabitur venenatis efficitur lorem sed tempor.
                                         Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum risus vel condimentum.
                                         </p>
                                    <div class="post-meta">
                                        <p class="d-none">By <a href="{{ route('singlepost',$post->id) }}">james smith</a></p>
                                        <p class="w-50 d-flex" style="float:left"> <i class="fa fa-comment"></i> <i class="fa fa-comment-o"></i>
                                            <span class="my-auto px-1"><span class="value">30</span>k Comments </span>
                                             </p>
                                        <p class="w-50 d-flex" style="float:right"> <i class="fa fa-heart"></i> <i class="fa fa-heart-o"></i> <span class="my-auto px-1">
                                            <span class="loved">500</span>k Loves</span></p>
                                        <br>
                                        <div class="comment-box mt-2" style="display: none">
                                            <form action="{{ route('singlepost',$post->id) }}" method="post" class="comment-form">
                                            <input type="text" name="comment" class="form-control my-comment"/>
                                            <input class="btn btn-sm btn-info mt-1 text-white float-right sent-comment" type="submit" value="Send" style="height: 30px;"/>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endforeach



                    <!-- Load More -->
                    <div class="load-more-btn mt-100 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="1000ms">
                        <a href="{{ route('singlepost',$post->id) }}" class="btn original-btn">Read More</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->
    @include('frontend.footer')
