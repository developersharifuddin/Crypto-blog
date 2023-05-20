@include('frontend.header')

    <div class="coming-soon-area bg-img background-overlay" style="background-image: url(img/bg-img/b9.jpg);">
        <!-- ##### Header Area Start ##### -->
        <header class="header-area">

            <!-- Logo Area -->
            <div class="logo-area text-center">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <a href="index.html" class="original-logo"><img src="img/logo.png" alt="" style="height: 65px;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ##### Header Area End ##### -->

        <!-- ##### Coming Soon Area Start ##### -->
        <div class="coming-soon-timer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="coming-soon-content">
                            <div class="sonar-wrapper">
                                <div class="sonar-emitter">
                                    <div class="sonar-wave">
                                    </div>
                                </div>
                            </div>
                            <p>our Next Ama is coming soon</p>
                        </div> 
                        <br><br>
                        <div id="clocks mt-4" class="d-flex align-items-center justify-content-between">
                            <div><h3 class="text-white">{{date('d',strtotime($programs->date))}}</h3></div>
                            <div><h3 class="text-white">{{date('M',strtotime($programs->date))}}</h3></div>
                            <div><h3 class="text-white">{{date('Y',strtotime($programs->date))}}</h3></div>
                            <div><h3 class="text-white"> {{date('h:i A',strtotime($programs->date))}}  </h3></div>
                         </div> <br><br>
                             
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Coming Soon Area End ##### -->

        <!-- ##### Contact Area Start ##### -->
        <div class="contact-area section-padding-100">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Contact Form Area -->
                    <div class="col-12 col-md-10 col-lg-9">
                        <div class="contact-form">
                            <h5>Get in Touch</h5>
                            <!-- Contact Form -->
                            <form action="{{route('contactus')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="name" id="name" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="email" name="email" id="email" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group">
                                            <input type="text" name="subject" id="subject" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="description" id="message" required></textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn original-btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-md-10 col-lg-3">
                        <div class="post-sidebar-area">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.footer')
