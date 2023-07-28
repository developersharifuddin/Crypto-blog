@extends('layouts.master')
@section("title")
Home
@endsection

@section('content')

<!-- Hero Section Start -->
<section class="hero-section-two bgs-cover overlay pt-40 rpt-80" @if(isset($banner->banner_image)) style="background-image: url('{{asset('uploads/banner_image/'.$banner->banner_image)}}')" @else style="background-image: url('{{asset('uploads/banner_image/banner_image.jpg')}}')" @endif>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-11">
                <div class="hero-content text-white py-220 rpy-120">
                    <span class="sub-title d-block wow fadeInUp delay-0-2s">@if(isset($banner->title)) {{$banner->title}} @endif</span>
                    <h1 class="wow fadeInUp delay-0-4s mt-20">@if(isset($banner->sub_title)) {{$banner->sub_title}} @endif</h1>
                    <div class="hero-btns mt-35 wow fadeInUp delay-0-6s">
                        <a href="{{$banner->btn_url}}" target="_blank" class="theme-btn mr-25">@if(isset($banner->btn_name)) {{$banner->btn_name}} @endif</a>
                        <a href="@if(isset($banner->video_play_link)) {{$banner->video_play_link}} @endif" class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->


<!-- Services Start -->
<section class="services-four pt-115 rpt-95 pb-210 rpb-150">
    <div class="container">
        <div class="row justify-content-between align-items-center mb-40">
            <div class="col-lg-6 wow fadeInLeft delay-0-2s">
                <div class="section-title mb-35">
                    @if(isset($service->title))
                    <span class="sub-title">{{$service->title}}</span>
                    @endif
                    @if(isset($service->sub_title))
                    <h2>{{$service->sub_title}}</h2>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 wow fadeInRight delay-0-2s">
                @if(isset($service->description))
                <p>{{$service->description}}</p>
                @endif
            </div>
        </div>
        <div class="row">

            @foreach($services_items as $key=>$services_item)
            <div class="col-lg-4 col-sm-6">
                <div class="service-item-four wow fadeInUp delay-0-2s">
                    <div class="image">
                        <img src="{{asset('uploads/services_items_image/'.$services_item->services_items_image)}}" alt="{{$services_item->services_items_image}}" style="max-height: 3000px;">
                    </div>
                    <div class="service-four-content">
                        <div class="service-title-area">
                            <p style="min-height:55px;"> <span class="category">{{$services_item->category_name}}</span></p>
                            <h3 style="min-height:75px"><a href="{{$services_item->url}}" class="text-dark" target="_blank">{{$services_item->url_name}}</a></h3>
                        </div>
                        <i class="flaticon {{$services_item->icon}}"></i>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Services End -->

<!-- Wrok Progress Start -->
<section class="work-progress-three bg-gold text-white pb-85 rpb-65" style="background-image: url('{{asset('frontend/images/background/progress.png')}}')">
    <div class="container">
        <div class="logo-carousel-wrap style-two bg-white py-100 px-25 br-5">
            @foreach($work_progress as $key=>$work_progres)
            <div class="logo-item">
                <a href="{{$work_progres->url}}" target="_blank"><img src="{{asset('uploads/work_progress_logo/'.$work_progres->work_progress_logo)}}" alt="{{$work_progres->name}}" style="max-height: 50px;"></a>
            </div>
            @endforeach
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
                        <a href="{{$pro->link}}" target="" class="learn-more" disabled>Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
<!-- Wrok Progress End -->

<!-- About Section Start -->
<section class="about-three py-120 rpy-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-three-image rmb-60 mr-10 rmr-0 wow fadeInLeft delay-0-2s">
                    <img src="{{asset('frontend/images/about/about-seven.png')}}" alt="{{$aboutus->image}}">
                    <img src="{{asset('uploads/about_us/'.$aboutus->image)}}" alt="{{$aboutus->image}}" style="max-height: 300px;">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content pl-70 rpl-0 wow fadeInRight delay-0-2s">
                    <div class="section-title mb-35">
                        @if(isset($aboutus->title))
                        <span class="sub-title"> {{$aboutus->title}}</span>
                        <h2>{{$aboutus->sub_title}}</h2>
                        @endif
                    </div>
                    @if(isset($aboutus->title))
                    <p>{{$aboutus->description}}</p>
                    @endif
                    <ul class="list-style-three mt-15">
                        @foreach($about_us_lists as $key=>$about_us_list)
                        <li>{{$about_us_list->list}}</li>
                        @endforeach
                    </ul>
                    @if(isset($aboutus->btn_name))
                    <a href="{{$aboutus->btn_url}}" target="" class="theme-btn style-three mt-25 disabled">{{$aboutus->btn_name}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Testimonial Section Start -->
<section class="testimonial-section bg-lighter pt-115 rpt-95 pb-120 rpb-100">
    <div class="container">
        <div class="section-title text-center mb-65">
            @if(isset($counter_masters->title))
            <span class="sub-title">{{$counter_masters->title}}</span>
            @endif
            @if(isset($counter_masters->sub_title))
            <h2 class="col-lg-9 mx-auto text-center">{{$counter_masters->sub_title}}</h2>
            @endif
        </div>
        <div class="fact-counter-color text-center mb-30">
            <div class="row justify-content-center">


                @foreach($counter_children as $counter)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="success-item wow fadeInUp delay-0-2s">
                        <span class="count-text plus" data-speed="5000" data-stop="{{$counter->exp_value}}">0</span>
                        <p>{{$counter->exp_name}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <div class="testimonial-wrap">
            @foreach($test as $tes)

            <div class="testimonial-item wow fadeInLeft delay-0-2s">
                <div class="author-description">
                    <img src="{{asset('uploads/testimonial/'.$tes->test_image)}}" alt="Author" style="max-height: 100px; max-width: 100px; border-radius:100%">
                    <div class="designation">

                        <h5>{{$tes->name}}</h5>
                        <span>{{$tes->post}}</span>
                    </div>
                    <i class="fas fa-quote-right"></i>
                </div>
                <p>{!!mb_strimwidth(($tes->description),0,200,'.....')!!}</p>
            </div>
            @endforeach



        </div>
    </div>
</section>
<!-- Testimonial Section End -->


<!-- Subscribe Section Start -->
<section class="subscribe-section bg-blue pt-115 rpt-95 pb-90 rpb-85">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-title text-white mb-25 rmb-35 wow fadeInLeft delay-0-2s">
                    <h2>Sign up for latest IT resources news from Restly</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <form class="subscribe-form mb-15 wow fadeInRight delay-0-2s" action="#">
                    <input type="email" placeholder="Your Email Address" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Subscribe Section End -->


<!--======== Map =========-->
<div class="contact-page-map">
    <div class="our-location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7304.860947080802!2d90.406665!3d23.732024!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d6ae3168ebd651e!2sZ%20IT%20Solutions%20Ltd.!5e0!3m2!1sen!2sbd!4v1657103146735!5m2!1sen!2sbd" height="650" style="border:0; width: 100%;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<!--======== Map =========-->


<!-- Gallery Section Start -->
<section class="gallery-section-three overlay pt-120 rpt-95 pb-105 rpb-85">
    <div class="container">
        <div class="section-title gellery-section-title mb-55 wow fadeInUp delay-0-2s">
            <span class="sub-title">Our Gallery</span>
            <h2>Explore our recent projects</h2>
            <div class="gallery-carousel-arrow mt-25">
                <button class="gallery-prev slick-arrow"><i class="fas fa-arrow-left"></i></button>
                <button class="gallery-next slick-arrow"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
        <div class="gallery-three-wrap wow fadeInRight delay-0-2s">
            @foreach($gallery as $gallery_item)
            <div class="gallery-item style-three">
                <img src="{{asset('uploads/gallery_image/'.$gallery_item->services_image)}}" alt="{{$gallery_item->services_image}}" style="max-height: 400px;">
                <div class="gallery-content">
                    <h5><a href="{{$gallery_item->services_url}}" target="_blank">{{$gallery_item->services_name}}</a></h5>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Gallery Section End -->


<!-- Contact Area Start -->
<section class="contact-two">
    <div class="container">
        <div class="contact-section-inner p-50 bg-white">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-section-form px-15 rpx-0 rmb-50 wow fadeInLeft delay-0-2s">
                        <div class="section-title mb-20">
                            <h2>Get In Touch</h2>
                        </div>
                        <form class="contact-form" action="{{route('contact.store')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Your name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Your email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="number">Your phone number</label>
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
                    <div class="contact-image-number style-two bgs-cover overlay wow fadeInUp delay-0-4s" @if(isset($company_information->company_banner)) style="background-image: url({{asset('uploads/companyLogo/'.$company_information->company_banner)}}); @endif">
                        <div class="contact-informations text-white">
                            <h3>Don't hesitate to contact us</h3>
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
                                        <h5>Mon-Sat {{date('h:i A',strtotime($company_information->start_time))}} - {{date('h:i A',strtotime($company_information->end_time))}}</h5>
                                    </div>
                                </li>
                                @endif

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
