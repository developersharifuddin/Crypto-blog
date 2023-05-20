@extends('layouts.master')
@section("title")
Info Zit
@endsection

@section('content')


<!-- Page Banner Start -->
<section class="page-banner bgs-cover overlay pt-50" style="background-image: url('{{asset('frontend/images/banner.jpg')}}')">
    <div class="container">
        <div class="banner-inner">
            <h1 class="page-title">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Restly</a></li>
                    <li class="breadcrumb-item active">Services</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->


<!-- Featured Section Start -->
<section class="featured-section bgs-cover pt-115 rpt-95 pb-120 rpb-100" style="background-image: url('{{asset('frontend/images/feature/feature-bg.jpg')}}')">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="section-title text-center mb-35">
                    <span class="sub-title">WHO WE ARE</span>
                    <h2>We deal with the aspects of professional IT Services</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-4 col-md-6">
                <div class="feature-item wow fadeInUp delay-0-2s">
                    <div class="icon">
                        <i class="flaticon flaticon-art"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Data Center</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                        <a href="service-details.html" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="feature-item wow fadeInUp delay-0-4s">
                    <div class="icon">
                        <i class="flaticon flaticon-cloud-computing-1"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Cloud Services</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                        <a href="service-details.html" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="feature-item wow fadeInUp delay-0-6s">
                    <div class="icon">
                        <i class="flaticon flaticon-development-3"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Web Development</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                        <a href="service-details.html" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="feature-item wow fadeInUp delay-0-8s">
                    <div class="icon">
                        <i class="flaticon flaticon-analysis-1"></i>
                    </div>
                    <div class="feature-content">
                        <h5>IT Management</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                        <a href="service-details.html" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="feature-item wow fadeInUp delay-1-0s">
                    <div class="icon">
                        <i class="flaticon flaticon-web-development"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Software Development</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                        <a href="service-details.html" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="feature-item wow fadeInUp delay-1-2s">
                    <div class="icon">
                        <i class="flaticon flaticon-plan"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Machine Learning</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                        <a href="service-details.html" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-btn text-center mt-20">
            <a href="services.html" class="theme-btn">view all services</a>
        </div>
    </div>
</section>
<!-- Featured Section End -->


<!-- Wrok Progress Start -->
<section class="work-progress-three bg-blue text-white pt-115 rpt-95 pb-85 rpb-65" style="background-image: url('{{asset('frontend/images/background/progress.png')}}')">
    <div class="container">
        <div class="section-title text-center mb-35">
            <span class="sub-title">How We Do</span>
            <h2>Custom IT Solutions <br>for Your Business</h2>
        </div>
        <div class="work-progress-inner-three">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="progress-item-two style-two wow fadeInUp delay-0-2s">
                        <span class="progress-step">01</span>
                        <div class="icon">
                            <i class="flaticon flaticon-speech-bubble"></i>
                        </div>
                        <h3>Advertising and <br>Marketing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                        <a href="service-details.html" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="progress-item-two style-two wow fadeInUp delay-0-4s">
                        <span class="progress-step">02</span>
                        <div class="icon">
                            <i class="flaticon flaticon-vector"></i>
                        </div>
                        <h3>Web <br>Development</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                        <a href="service-details.html" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="progress-item-two style-two wow fadeInUp delay-0-6s no-border mb-0">
                        <span class="progress-step">03</span>
                        <div class="icon">
                            <i class="flaticon flaticon-like-1"></i>
                        </div>
                        <h3>Mobile App <br>Development</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                        <a href="service-details.html" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Wrok Progress End -->

<!-- Contact Area Start -->
<section class="contact-four pt-70 rpt-50 pb-120 rpb-100">
    <div class="container">
        <div class="contact-inner-four box-shadow p-35 rpx-25 br-5 bg-white">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-section-form px-15 rpx-0 rmb-50 wow fadeInLeft delay-0-2s">
                        <div class="section-title mb-20">
                            <h2>Get In Touch</h2>
                        </div>
                        <form id="contact-form" class="contact-form" name="contact-form" action="#" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Your name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Your email address</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="number">Your phone number</label>
                                        <input type="text" id="number" name="number" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service">Service Required</label>
                                        <select id="service" name="service">
                                            <option value="default" selected>Service</option>
                                            <option value="about">About</option>
                                            <option value="contact">Contact</option>
                                            <option value="team">Team</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="comments" id="comments" class="form-control" rows="4" placeholder="Let us know what you need." required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="theme-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-image-number style-two bgs-cover overlay wow fadeInRight delay-0-2s" style="background-image: url('{{asset('frontend/images/contact/home-two.jpg')}}')">
                        <div class="contact-informations text-white">
                            <h3>Don't hesitate to contact us</h3>
                            <ul class="contact-info">
                                <li>
                                    <i class="fas fa-phone-alt"></i>
                                    <div class="content">
                                        <span>Call Us</span>
                                        <h5><a href="callto:+012-345-6789">+012-345-6789</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <div class="content">
                                        <span>Write to Us</span>
                                        <h5><a href="mailto:info@example.com">info@example.com</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-clock"></i>
                                    <div class="content">
                                        <span>Office hours</span>
                                        <h5>Mon-Sat 9:00 - 7:00</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Area End -->

@endsection
 