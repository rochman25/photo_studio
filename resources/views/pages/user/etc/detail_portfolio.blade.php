@extends('layouts.app_user')
@section('user_pages')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Portfolio</h2>
                    <ol>
                        <li><a href="{{ route('view.user.home') }}">Home</a></li>
                        <li>Portfolio</li>
                        <li>Judul-Portfolio 1</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="portfolio-details">
            <div class="">
                <!-- ======= Portfolio Section ======= -->
                <div id="portfolio" class="portfolio">
                    <div class="container" data-aos="fade-up">
                        <div class="row" data-aos="fade-up" data-aos-delay="200">

                            <div class="col-lg-12 col-md-12 portfolio-item filter-app">
                                <img src="{{ asset('img/portfolio_1.png') }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>App 1</h4>
                                    <p>App</p>
                                    <a href="{{ asset('img/category_1.png') }}" data-gall="portfolioGallery"
                                        class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 portfolio-item filter-web">
                                <img src="{{ asset('img/portfolio_1.png') }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Web 3</h4>
                                    <p>Web</p>
                                    <a href="{{ asset('img/portfolio_1.png') }}" data-gall="portfolioGallery"
                                        class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 portfolio-item filter-app">
                                <img src="{{ asset('img/portfolio_1.png') }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>App 2</h4>
                                    <p>App</p>
                                    <a href="{{ asset('img/portfolio_1.png') }}" data-gall="portfolioGallery"
                                        class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 portfolio-item filter-card">
                                <img src="{{ asset('img/portfolio_1.png') }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Card 2</h4>
                                    <p>Card</p>
                                    <a href="{{ asset('img/portfolio_1.png') }}" data-gall="portfolioGallery"
                                        class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 portfolio-item filter-web">
                                <img src="{{ asset('img/portfolio_1.png') }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Web 2</h4>
                                    <p>Web</p>
                                    <a href="{{ asset('img/category_1.png') }}" data-gall="portfolioGallery"
                                        class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div><!-- End Portfolio Section -->
            </div>
        </section>

    </main>
@endsection
