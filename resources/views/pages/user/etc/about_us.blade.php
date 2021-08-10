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
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="pic"><img src="{{ asset('user_assets/img/ahidams.png') }}" alt=""></div>
                                    <h4>Ahidam</h4>
                                    <span>Editor</span>
                                    <div class="social">
                                        <a href="https://instagram.com/ahidams?utm_medium=copy_link" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="member" data-aos="fade-up" data-aos-delay="200">
                                    <div class="pic"><img src="{{ asset('user_assets/img/bellatrks.png') }}" alt=""></div>
                                    <h4>Belle</h4>
                                    <span>Project Admin</span>
                                    <div class="social">
                                        <a href="https://instagram.com/bellatrks?utm_medium=copy_link" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="member" data-aos="fade-up" data-aos-delay="300">
                                    <div class="pic"><img src="{{ asset('user_assets/img/aji_balenk.png') }}" alt=""></div>
                                    <h4>Jibal</h4>
                                    <span>Project Admin</span>
                                    <div class="social">
                                        <a href="https://instagram.com/aji_balenk?utm_medium=copy_link" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="member" data-aos="fade-up" data-aos-delay="400">
                                    <div class="pic"><img src="{{ asset('user_assets/img/nuhho.png') }}" alt=""></div>
                                    <h4>Nuho</h4>
                                    <span>Photographer</span>
                                    <div class="social">
                                        <a href="https://instagram.com/nuhho?utm_medium=copy_link" target="_blank"><i class="fa fa-instagram"></i></a>
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