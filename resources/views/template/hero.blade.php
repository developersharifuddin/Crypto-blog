@extends('layouts.master')
    @section("title")Info Zit @endsection
@section('content')
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Z <span>IT</span></span></h2>
                <p class="animate__animated animate__fadeInUp"> improve the efficiency and throughput of the development teams as well as improve software systems architecture to be aligned with the business goals of the company in the best way possible.</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Enhancing Your Service Capacity</h2>
                <p class="animate__animated animate__fadeInUp">improve the efficiency and throughput of the development teams as well as improve software systems architecture to be aligned with the business goals of the company in the best way possible.</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">ERP To Drive Your Business Solutions</h2>
                <p class="animate__animated animate__adeInUp">The success of our services is built around a methodology where every client engagement, from strategic planning through implementation and evaluation, is handled seamlessly.</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section>
@endsection
