<!-- ##### Instagram Feed Area Start ##### -->
<div class="instagram-feed-area pb-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="insta-title">
                    <h5>Follow us @ Instagram</h5>
                </div>
            </div>
        </div>
    </div>


    @php
    $posts = DB::table('posts')
    ->where('is_active', 1)->latest()->get();
    @endphp
    <div class="instagram-slides owl-carousel container">
        @foreach ($posts as $post)
        <!-- Single Insta Feed -->
        <div class="single-insta-feed">
            <!-- Hover Effects -->
            <div class="hover-effects">
                <img class="img-fluidt" src="{{asset('uploads/images/'.$post->images)}}" alt="" style="max-height:150px !important">
                <a href="{{ route('singlepost',$post->id) }}" class="d-flex align-items-center justify-content-center">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>

        @endforeach

    </div>
</div>
<!-- ##### Instagram Feed Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area text-center bg-light mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Footer Nav Area -->
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="navbar justify-content-center">
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul class="d-flex">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('commingsoon')}}">Coming Soon</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->

                    </nav>
                </div>
                <!-- Footer Social Area -->
                <div class="footer-social-area mt-30 mb-10">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>

    <aside>
        <article>
            <a href="https://www.linkedin.com/in/md-sharif-uddin" target="_blank" class="mt-4 pb-3" alt="https://www.linkedin.com/in/md-sharif-uddin" title="https://www.linkedin.com/in/md-sharif-uddin"> Copyright &copy;<script>
                    document.write(new Date().getFullYear());

                </script> All rights reserved by Developer</a>
        </article>
    </aside>

</footer>
<!-- ##### Footer Area End ##### -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset('frontend/js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<!-- Active js -->
<script src="{{asset('frontend/js/active.js')}}"></script>

<script>
    $(document).ready(function() {
        $(".navbarToggler").click(function() {
            $(this).hide();
            $(".cross-wrap").show();
        });
        $(".cross-wrap").click(function() {
            $(this).hide();
            $(".navbarToggler").show();
        });
    });

</script>
</body>
</html>
