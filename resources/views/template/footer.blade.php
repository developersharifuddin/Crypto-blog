 <!-- Footer Area Start -->
 @php

 $company_information = DB::table('company_information')
 ->select('company_information.company_logo','company_information.phone1',
 'company_information.email1',
 'company_information.Address',
 'company_information.description',
 'company_information.newsletter_description',
 'company_information.social_link_facebook',
 'company_information.social_link_twitter',
 'company_information.social_link_instragram',
 'company_information.social_link_viber',
 'company_information.copyright')
 ->first();
 $headers = DB::table('headers')->orderBy('sequense', 'ASC')->get();

 $headers = DB::table('headers')->orderBy('sequense', 'ASC')->get();
 $services_items = DB::table('services_items')->get();
 @endphp
 <footer class="main-footer footer-two bgs-cover text-white pt-150 rpt-115" style="background-image: url('{{asset('frontend/images/footer/footer-bg-map.png')}}')">
   <div class="container">
     @yield('footer-top')
     <div class="footer-widget-area pt-85 pb-30">
       <div class="row">
         <div class="col-lg-3 col-sm-6">
           <div class="footer-widget about-widget">
             <div class="footer-logo mb-35">
               @if(isset($company_information->company_logo))
               <img src="{{asset('uploads/companyLogo/'.$company_information->company_logo)}}" alt="{{$company_information->company_logo}}" height="70px" width="70px" title="{{$company_information->company_logo}}">
               @endif
             </div>
             @if(isset($company_information->description))
             <div class="text">
               {{$company_information->description}}
             </div>
             @endif
             <ul class="contact-info mt-20">
               @if(isset($company_information->Address))
               <li><i class="fas fa-map-marker-alt"></i><span>{{$company_information->Address}}</span></li>
               @endif
             </ul>
           </div>
         </div>
         <div class="col-lg-2 col-6">
           <div class="footer-widget link-widget ml-20 rml-0">
             <h4 class="footer-title">Page Links</h4>
             <ul class="list-style-two">
               @foreach($headers as $header)
               <li><a href="{{$header->url}}" target="_blank">{{$header->menu_name}}</a></li>
               @endforeach
             </ul>
           </div>
         </div>
         <div class="col-lg-3 col-6">
           <div class="footer-widget link-widget ml-20 rml-0">
             <h4 class="footer-title">Explore</h4>
             <ul class="list-style-two">
               @foreach($services_items as $services_item)
               <li><a href="{{$services_item->url}}" target="_blank">{{$services_item->url_name}}</a></li>
               @endforeach
             </ul>
           </div>
         </div>
         <div class="col-lg-4 col-sm-6">
           <div class="footer-widget newsletter-widget">
             <h4 class="footer-title">Newsletter</h4>
             @if(isset($company_information->newsletter_description))
             <p>{{$company_information->newsletter_description}}</p>
             @endif
             <form action="#" method="post">
               <input type="email" name="EMAIL" placeholder="Your Email Address" required>
               <button value="submit"><i class="fa fa-location-arrow"></i></button>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="copyright-area">
     <div class="container">
       <div class="copyright-inner pt-15">
         <div class="social-style-one mb-10">

           @if(isset($company_information->social_link_facebook))
           <a href="{{$company_information->social_link_facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
           @endif
           @if(isset($company_information->social_link_twitter))
           <a href="{{$company_information->social_link_twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
           @endif
           @if(isset($company_information->social_link_instragram))
           <a href="{{$company_information->social_link_instragram}}" target="_blank"><i class="fab fa-instagram"></i></a>
           @endif
           @if(isset($company_information->social_link_viber))
           <a href="{{$company_information->social_link_viber}}" target="_blank"><i class="fab fa-viber"></i></a>
           @endif

         </div>

         @if(isset($company_information->copyright))
         <p>copyright {{ $company_information->copyright }} </p>
         @endif

       </div>
     </div>
   </div>
 </footer>
 <!-- Footer Area End -->

 </div>
 <!--End pagewrapper-->

 <!-- Scroll Top Button -->
 <button class="scroll-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></button>

 <!--====== Jquery ======-->
 <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
 <!--====== Bootstrap ======-->
 <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
 <!--====== Appear Js ======-->
 <script src="{{asset('frontend/js/appear.min.js')}}"></script>
 <!--====== Slick ======-->
 <script src="{{asset('frontend/js/slick.min.js')}}"></script>
 <!--====== Magnific Popup ======-->
 <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
 <!--====== Isotope ======-->
 <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
 <!--  WOW Animation -->
 <script src="{{asset('frontend/js/wow.js')}}"></script>
 <!-- Custom script -->
 <script src="{{asset('frontend/js/script.js')}}"></script>

 <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 {!! Toastr::message() !!}
 </body>


 <!-- Mirrored from html.themepul.com/restly/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jul 2022 09:08:43 GMT -->

 </html>