@extends('layouts.master')
@section("title")
Info Zit
@endsection

@section('content')

<!-- Page Banner Start -->

<section class="page-banner bgs-cover overlay pt-50" @if(isset($banner->banner_image)) style="background-image: url('{{asset('uploads/banner_image/'.$banner->banner_image)}}')" @else style="background-image: url('{{asset('uploads/banner_image/banner_image.jpg')}}')" @endif>
  <div class="container">
    <div class="banner-inner">
      @if(isset($banner->contact_title))
      <h1 class="page-title">{{$banner->contact_title}}</h1>
      @endif
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          @if(isset($banner->menu))
          <li class="breadcrumb-item"><a href="/">{{$banner->logo_name}}</a></li>
          <li class="breadcrumb-item active">{{$banner->menu}}</li>
          @endif
        </ol>
      </nav>
    </div>
  </div>
</section>

<!-- Page Banner End -->








<!-- Contact Section Start -->
<section class="contact-page py-120 rpy-100">
  <div class="container">
    @if(isset($company_information->Address) || isset($company_information->email1) || isset($company_information->phone1))
    <div class="contact-info-area mb-80">
      @if(isset($company_information->Address))
      <div class="contact-info-item wow fadeInUp delay-0-2s">
        <i class="far fa-map"></i>
        <p>{{$company_information->Address}}</p>
      </div>
      @endif
      @if(isset($company_information->email1))
      <div class="contact-info-item wow fadeInUp delay-0-4s">
        <a href="mailto: {{$company_information->email1}}"><i class="far fa-envelope"></i></a>
          <p>

            <a href="mailto:{{$company_information->email1}}">{{$company_information->email1}}</a> <br>
            @if(isset($company_information->email2))
            <a href="callto:{{$company_information->email2}}">{{$company_information->email2}}</a>
            @endif
          </p>
      </div>
      @endif

      @if(isset($company_information->phone1))
      <div class="contact-info-item wow fadeInUp delay-0-6s">
        <a href="callto: {{$company_information->phone1}}"> <i class="fas fa-phone-alt"></i></a>

        <p>

          <a href="callto:{{$company_information->phone1}}">{{$company_information->phone1}}</a> <br>
          @if(isset($company_information->phone2))
          <a href="callto:{{$company_information->phone2}}">{{$company_information->phone2}}</a>
          @endif
        </p>
      </div>
      @endif
    </div>
    @endif





    <div class="row">
      <div class="col-lg-4">
        <div class="contact-image-number style-two bgs-cover overlay wow fadeInUp delay-0-4s" @if(isset($company_information->company_banner)) style="background-image: url({{asset('uploads/companyLogo/'.$company_information->company_banner)}}); @endif">
          <h2>Leave A Message</h2>

        </div>
      </div>
      <div class="col-lg-8">
        <div class="contact-form ml-40 rml-0 rmt-55 wow fadeInRight delay-0-2s">
          <h3 class="comment-title mb-35">Send A Message</h3>
          <p>Avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter</p>
          <form class="comment-form mt-35" action="{{url('/createContactFormInput')}}" method="post">
            @csrf
            <div class="row clearfix justify-content-center">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="full-name"><i class="far fa-user"></i></label>
                  <input type="text" name="name" class="form-control" value="" placeholder="Your Full Name" required="">
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
                  <textarea name="description" id="description" class="form-control" rows="4" placeholder="Write Message" required=""></textarea>
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