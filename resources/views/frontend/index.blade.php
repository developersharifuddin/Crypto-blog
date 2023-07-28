@include('frontend.header')

<style>
    .user .live-link {
        font-weight: normal !important;
        font-size: 11px;
    }

</style>
<style>
    .fa-comment {
        display: none;
        color: rgb(104, 101, 241);
        font-size: 19px;
    }

    .fa-comment-o {
        display: block;
        color: rgb(104, 101, 241);
        font-size: 19px;
    }

    .fa-heart {
        display: none;
        color: rgb(255, 0, 166);
        font-size: 19px;
    }

    .fa-heart-o {
        display: block;
        color: rgb(255, 0, 166);
        font-size: 19px;
    }

    .comment-box {
        display: none;
        float: left;
        width: 100%;
        z-index: 999;
        overflow: visible;
    }

    .comment-box input {
        height: 38px;
        overflow: visible;
        font-size: 12px;
        color: 555;
    }

</style>
<script>
    $(document).ready(function() {
        $('.fa-comment-o').on('click', function() {
            // var r = $(this).attr('class');
            // alert(r);
            var numVal = parseInt($(".value").text());

            $('.comment-box').css('display', 'block');

            $(function() {
                //hang on event of form with id=myform
                $(".comment-form").submit(function(e) {
                    //prevent Default functionality
                    e.preventDefault();

                    if ($('.my-comment').val() == '') {
                        alert('Please Write a comment first ?');
                    } else {
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
                        url: actionurl
                        , type: 'post'
                        , dataType: 'application/json'
                        , data: $("#myform").serialize()
                        , success: function(data) {
                            $('.comment-form')[0].reset();
                        }
                    });
                });
            });
        });


        $('.fa-comment').on('click', function() {
            $('.comment-box').css('display', 'block');
        });


        $('.fa-heart-o').on('click', function() {
            var love = parseInt($(".lovevalue").text());
            var t = $this.data - id();
            $('.fa-heart').css('display', 'block');
            $('.fa-heart-o').css('display', 'none');
            ++love;
            $(".loved").text(love);
        });

        $('.fa-heart').on('click', function() {
            var love = parseInt($(".lovevalue").text());
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
<div class="blog-wrapper section-padding pt-3 clearfix">
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
                            <h4><a href="{{ url('/post') }}" class="post-headline">Welcome to this Cripto Detector blog</a></h4>
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
                                                    <a href="{{ route('singlepost',$post->id) }}" data-animation="fadeInUp">Cripto Detector</a>
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


    <div class="container px-0 px-md-auto mb-0">
        <div class="row justify-content-center mx-auto mb-0">
            <!-- Single Blog Area -->
            <div class="col-12 col-md-8 col-lg-8 mt-0 pr-lg-5">
                <p class="mb-2" style=" text-align:justify mt-5"><b>Our Latest Blog Post </b> </p>
                @foreach ($posts as $post)
                <!-- Single Blog Area  -->
                <div class="single-blog-area blog-style-2 wow fadeInUp p-2 mb-2 mb-md-4 border-bottom" data-wow-delay="0.2s" data-wow-duration="1000ms">
                    <div class="row my-auto">
                        <div class="col-6 col-md-6 col-lg-6 pr-2 my-auto">
                            <div class="post-user-append pb-3 pb-md-0 my-auto"></div>
                            <div class="single-blog-thumbnail text:right">
                                <a href="{{ route('singlepost',$post->id) }}">
                                    <img src="{{asset('uploads/images/'.$post->images)}}" alt="">
                                </a>
                            </div>
                        </div>


                        <div class="col-6 col-md-6 col-lg-6 px-1">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="c">
                                    <div class="post-head col-12 col-md-12 px-0 pt-2 mx-0 my-auto">

                                        <h4 class="pb-0 mb-0 mt-2"><a href="{{ route('singlepost',$post->id) }}" class="post-headline">{!! Str::limit($post->title, 22, ' ...') !!}</a></h4>
                                        <div class="post-meta mt-0">
                                            <p>By <a href="{{ route('singlepost',$post->id) }}">{!! Str::limit($post->name, 40, ' ...') !!}</a></p>
                                        </div>
                                        <div class="user" style="line-height: .4;">
                                            <a href="{{ route('singlepost',$post->id) }}" class="live-link">Post <span>{{date('D-M-y h:i A',strtotime($post->date))}}</span></a>
                                        </div>
                                        <p class="pr-2 d-none d-md-block" style=" text-align:justify;">
                                            {{-- {!!\Illuminate\Support\Str::limit(html_entity_decode($post->description),300,"...")!!} --}}
                                            {!! \Illuminate\Support\Str::limit(strip_tags($post->description), 160, '...') !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                @endforeach
            </div>

            <div class="col-12 col-md-4 col-lg-4 bg-light">
                <div class="post-sidebar-area py-3">

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
                        <h5 class="title mb-3">Advertisement</h5>
                        <a href="#"><img src="frontend/img/add.gif" alt="" width="100%"></a>
                    </div>

                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title mb-3">Latest Posts</h5>

                        <div class="widget-content">
                            @foreach ($posts as $post)
                            <!-- Single Blog Post -->
                            <div class="row px-md-5">

                                <div class="card py-3 pb-0 mb-2" style="max-width: 540px;">
                                    <div class="row single-blog-post align-items-start mx-auto widget-post mb-0 pb-0">
                                        <div class="col-6 col-md-6">
                                            <a href="{{ route('singlepost',$post->id) }}">
                                                <img class="img-fluid rounded-start" src="{{asset('uploads/images/'.$post->images)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-6 col-md-6 px-0">
                                            <div class="card-body post-content text-start p-0">
                                                <h4 class="p-0 mb-1" style="line-height: .7;"><a href="{{ route('singlepost',$post->id) }}" class="post-headline mb-0">{!! Str::limit($post->title, 32, ' ...') !!}</a></h4>
                                                <div class="post-meta m-0">
                                                    <p><a href="{{ route('singlepost',$post->id) }}" style="font-size: 10px;">{{date('D-M-y h:i A',strtotime($post->date))}}</a></p>
                                                </div>
                                                <div class="post-meta m-0">
                                                    <p style="font-size: 9px; color:#444">By <a href="{{ route('singlepost',$post->id) }}" style="font-size: 8px; color:#444">{!! Str::limit($post->name, 40, ' ...') !!}</a>
                                                </div>
                                            </div>
                                        </div>
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
                                <li><a href="#">Facebook Promote</a></li>
                                <li><a href="#">Youtube Promote</a></li>
                                <li><a href="#">Twitter Promote</a></li>
                                <li><a href="#">Telegram Promotet</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.footer')
