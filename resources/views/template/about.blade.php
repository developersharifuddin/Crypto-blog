@extends('layouts.master')
@section("title")
About-us
@endsection

@section('content')

<!-- Page Banner Start -->

<section class="page-banner bgs-cover overlay pt-50" @if(isset($banner->banner_image)) style="background-image: url('{{asset('uploads/banner_image/'.$banner->banner_image)}}')" @else style="background-image: url('{{asset('uploads/banner_image/banner_image.jpg')}}')" @endif>
    <div class="container">
        <div class="banner-inner">
            @if(isset($about_banner->about_title))
            <h1 class="page-title">{{$about_banner->about_title}}</h1>
            @endif
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @if(isset($about_banner->menu))
                    <li class="breadcrumb-item"><a href="index.html">{{$about_banner->logo_name}}</a></li>
                    <li class="breadcrumb-item active">{{$about_banner->menu}}</li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->




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
                    <a href="{{$aboutus->btn_url}}" class="theme-btn style-three mt-25">{{$aboutus->btn_name}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->





<!-- Wrok Progress Start -->
<section class="work-progress-three bg-gold text-white pb-85 rpb-65" style="background-image: url('{{asset('frontend/images/background/progress.png')}}'); margin-top:15vh">
    <div class="container">

        <div class="logo-carousel-wrap style-two bg-white py-100 px-25 br-5">
            @foreach($work_progress as $key=>$work_progres)
            <div class="logo-item">
                <a href="{{$work_progres->url}}"><img src="{{asset('uploads/work_progress_logo/'.$work_progres->work_progress_logo)}}" alt="{{$work_progres->name}}" style="max-height: 50px;"></a>
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
                        <a href="{{$pro->link}}" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Wrok Progress End -->


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


<!-- Contact Area Start -->
<section class="contact-four py-120 rpy-100">
    <div class="container">
        <div class="contact-inner-four box-shadow p-35 rpx-25 br-5 bg-white">
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
                <h5>Mon-Sat {{date('h:i A',strtotime($company_information->start_time))}} - {{date('h:i A',strtotime($company_information->end_time))}}</h5>
            </div>
        </li>
        @endif
    </ul>
</div>
@endsection
