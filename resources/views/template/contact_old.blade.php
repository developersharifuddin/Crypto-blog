@extends('layouts.master')
@section("title")
Contact-us
@endsection

@section('content')

<!-- Page Banner Start -->
<section class="page-banner bgs-cover overlay pt-50" style="background-image: url('{{asset('frontend/images/banner.jpg')}}')">
    <div class="container">
        <div class="banner-inner">
            <h1 class="page-title">Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Restly</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->


<!-- Contact Section Start -->
<section class="contact-page py-120 rpy-100">
    <div class="container">
        <div class="contact-info-area mb-80">
            <div class="contact-info-item wow fadeInUp delay-0-2s">
                <i class="far fa-map"></i>
                <p>27 Division St, New York, NY 10002,USA</p>
            </div>
            <div class="contact-info-item wow fadeInUp delay-0-4s">
                <i class="far fa-envelope"></i>
                <p><a href="mailto:support@gmail.com">support@gmail.com</a> <br><a href="#">www.restly.net</a></p>
            </div>
            <div class="contact-info-item wow fadeInUp delay-0-6s">
                <i class="fas fa-phone-alt"></i>
                <p><a href="callto:+08(964)712365">+08 (964) 712365</a> <br><a href="callto:+0234(456)9864">+0234 (456) 9864</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-form-left bgs-cover h-100 wow fadeInLeft delay-0-2s" style="background-image: url('{{asset('frontend/images/contact/contact-page.jpg')}}')">
                    <h2>Leave A Message</h2>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-form ml-40 rml-0 rmt-55 wow fadeInRight delay-0-2s">
                    <h3 class="comment-title mb-35">Send A Message</h3>
                    <p>Avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter</p>
                    <form id="comment-form" class="comment-form mt-35" name="comment-form" action="#" method="post">
                        <div class="row clearfix justify-content-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="full-name"><i class="far fa-user"></i></label>
                                    <input type="text" id="full-name" name="full-name" class="form-control" value="" placeholder="Your Full Name" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email"><i class="far fa-envelope"></i></label>
                                    <input type="email" id="email" name="email" class="form-control" value="" placeholder="Your Email" required="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="comments"><i class="fas fa-pencil-alt"></i></label>
                                    <textarea name="comments" id="comments" class="form-control" rows="4" placeholder="Write Message" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="theme-btn">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->


<!--======== Map =========-->
<div class="contact-page-map">
    <div class="our-location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7304.860947080802!2d90.406665!3d23.732024!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d6ae3168ebd651e!2sZ%20IT%20Solutions%20Ltd.!5e0!3m2!1sen!2sbd!4v1657103146735!5m2!1sen!2sbd" height="650" style="border:0; width: 100%;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<!--======== Map =========-->



@endsection
