@extends('layouts.master')
@section("title")
Info Zit
@endsection

@section('content')

<!-- Page Banner Start -->
<section class="page-banner bgs-cover overlay pt-50" @if(isset($banner->banner_image)) style="background-image: url('{{asset('uploads/banner_image/'.$banner->banner_image)}}')" @else style="background-image: url('{{asset('uploads/banner_image/banner_image.jpg')}}')" @endif>
    <div class="container">
        <div class="banner-inner">
            @if(isset($banner->service_title))
            <h1 class="page-title">{{$banner->service_title}}</h1>
            @endif
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @if(isset($banner->menu))
                    <li class="breadcrumb-item"><a href="index.html">{{$banner->menu}}</a></li>
                    @endif
                    @if(isset($banner->logo_name))
                    <li class="breadcrumb-item active">{{$banner->logo_name}}</li>
                    @endif
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
            @foreach($services as $item)
            <div class="col-xl-4 col-md-6">
                <div class="feature-item wow fadeInUp delay-0-2s">
                    <div class="icon">
                        <i class="<?php echo $item->icon_name; ?>"></i>
                    </div>
                    <div class="feature-content">
                        <h5>{{$item->title}}</h5>
                        <p>{{$item->subtitle}}</p>
                        <a href="{{$item->link}}" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="feature-btn text-center mt-20">
            <a href="services.html" class="theme-btn">view all services</a>
        </div>
    </div>
</section>
<!-- Featured Section End -->


<!-- Wrok Progress Start -->
<section class="work-progress-three bg-gold text-white pt-115 rpt-95 pb-85 rpb-65" style="background-image: url('{{asset('frontend/images/background/progress.png')}}')">
    <div class="container">
        <div class="section-title text-center mb-35">
            <span class="sub-title">How We Do</span>
            <h2>Custom IT Solutions <br>for Your Business</h2>
        </div>
        <div class="work-progress-inner-three">
            <div class="row justify-content-center">
                @foreach($progress as $pro)
                <div class="col-lg-4 col-sm-6">
                    <div class="progress-item-two style-two wow fadeInUp delay-0-2s">
                        <span class="progress-step">{{$pro->id}}</span>
                        <div class="icon">
                            <i class="<?php echo $pro->icon_name ?>"></i>
                        </div>
                        <h3>{{$pro->title}}</h3>
                        <p>{{$pro->subtitle}}</p>
                        <a href="{{$pro->link}}" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
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
                        <form class="contact-form" action="{{route('contact.store')}}" method="post">

                            <div class="row">
                                @csrf
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Your name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email1">Your email address</label>
                                        <input type="email1" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="number">Your number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service">Service Required</label>
                                        <select name="service">
                                            <option value="default" selected>Service</option>
                                            <option value="about">About</option>
                                            <option value="contact">Contact</option>
                                            <option value="team">Team</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" rows="4" placeholder="Let us know what you need." required></textarea>
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
                    <div class="contact-image-number style-two bgs-cover overlay wow fadeInRight delay-0-2s" @if(isset($company_information->company_banner)) style="background-image: url({{asset('uploads/companyLogo/'.$company_information->company_banner)}}); @endif">
                        <div class="contact-informations text-white">
                            <h3>Don't hesitate to contact us</h3>
                            <ul class="contact-info">
                                <li>
                                    <i class="fas fa-phone-alt"></i>
                                    <div class="content">

                                        @if(isset($company_information->phone1))
                                        <span>Call Us</span>
                                        <h5><a href="callto:{{$company_information->phone1}}">{{$company_information->phone1}}</a></h5>
                                        @endif

                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <div class="content">

                                        @if(isset($company_information->email1))

                                        <span>Write to Us</span>
                                        <h5><a href="mailto:{{$company_information->email1}}">{{$company_information->email1}}</a></h5>
                                        @endif

                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-clock"></i>
                                    <div class="content">

                                        @if(isset($company_information->start_time))
                                        <span>Office hours</span>
                                        <h5>Mon-Sat {{date('h:i A',strtotime($company_information->start_time))}} - {{date('h:i A',strtotime($company_information->end_time))}}</h5>
                                        @endif
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

@section('footer-top')
<div class="footer-top" style="margin-top: -65px;">
    <ul class="contact-info">
        @if(isset($company_information->phone1))
        <li>
            <i class="fas fa-phone-alt"></i>
            <div class="content">
                <span>Call Us</span>
                <h5><a href="callto:{{$company_information->phone1}}">{{$company_information->phone1}}</a></h5>
            </div>
        </li>
        @endif
        @if(isset($company_information->email1))
        <li>
            <i class="fas fa-envelope"></i>
            <div class="content">
                <span>Write to Us</span>
                <h5><a href="mailto:{{$company_information->email1}}">{{$company_information->email1}}</a></h5>
            </div>
        </li>
        @endif
        @if(isset($company_information->start_time))
        <li>
            <i class="fas fa-clock"></i>
            <div class="content">
                <span>Office hours</span>
                <h5>Mon-Sat {{$company_information->start_time}} - {{$company_information->end_time}}</h5>
            </div>
        </li>
        @endif
    </ul>
</div>
@endsection