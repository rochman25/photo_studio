@extends('layouts.app_user')
@section('user_pages')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>About Us</h2>
                    <ol>
                        <li><a href="{{ route('view.user.home') }}">Home</a></li>
                        <li>About Us</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="portfolio-details">
            <div class="">
                <!-- ======= Team Section ======= -->
                <div id="team">
                    <div class="container" data-aos="fade-up">
                        <div class="section-header">
                            <h3 class="section-title">Team</h3>
                            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium doloremque</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="pic"><img src="{{ asset('user_assets/img/team-1.jpg') }}" alt=""></div>
                                    <h4>Walter White</h4>
                                    <span>Chief Executive Officer</span>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                        <a href=""><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="member" data-aos="fade-up" data-aos-delay="200">
                                    <div class="pic"><img src="{{ asset('user_assets/img/team-2.jpg') }}" alt=""></div>
                                    <h4>Sarah Jhinson</h4>
                                    <span>Product Manager</span>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                        <a href=""><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="member" data-aos="fade-up" data-aos-delay="300">
                                    <div class="pic"><img src="{{ asset('user_assets/img/team-3.jpg') }}" alt=""></div>
                                    <h4>William Anderson</h4>
                                    <span>CTO</span>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                        <a href=""><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="member" data-aos="fade-up" data-aos-delay="400">
                                    <div class="pic"><img src="{{ asset('user_assets/img/team-4.jpg') }}" alt=""></div>
                                    <h4>Amanda Jepson</h4>
                                    <span>Accountant</span>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                        <a href=""><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Team Section -->
            </div>
        </section>

    </main>
@endsection