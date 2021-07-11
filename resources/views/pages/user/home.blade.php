@extends('layouts.app_user')
@section('user_pages')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="" style="height:100vh" data-aos="zoom-in" data-aos-delay="100">
            {{-- <h1>Welcome to Regna</h1>
            <h2>We are team of talanted designers making websites with Bootstrap</h2>
            <a href="#about" class="btn-get-started">Get Started</a>
        </div> --}}
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @forelse ($heros as $item)
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height: 100vh" src="{{ public_path($item->file_url) }}"
                                alt="First slide">
                            {{-- <div class="carousel-caption d-none d-md-block">
                            <h5>Slide label</h5>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, dolorum rerum in
                                laudantium
                                labore error ex sint facere a iusto, nam minima quas vero aliquid, id tempora ipsam
                                minus
                                expedita?</p>
                        </div> --}}
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <img class="d-block w-100" style="height: 100vh" src="{{ asset('img/hero_1.png') }}"
                                alt="First slide">
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5>Slide label</h5>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, dolorum rerum in
                                    laudantium
                                    labore error ex sint facere a iusto, nam minima quas vero aliquid, id tempora ipsam
                                    minus
                                    expedita?</p>
                            </div> --}}
                        </div>
                    @endforelse
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="" data-aos="fade-up">
                <div class="section-header">
                    <h3 class="section-title">Portfolio</h3>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    @forelse ($portfolios as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('img/category_1.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <a href="{{ asset('img/category_1.png') }}" data-gall="portfolioGallery"
                                    class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 portfolio-item">
                            <div class="section-header">
                                <p class="section-description">{{ 'Portfolio Masih Kosong.' }}</p>
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">
                <div class="row about-container">

                    <div class="col-lg-6 content order-lg-1 order-2">
                        <h2 class="title">Few Words About Us</h2>
                        <p>
                            {{ $aboutUs }}
                        </p>

                        {{-- <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                                tempore, cum soluta nobis est eligendi</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="fa fa-photo"></i></div>
                            <h4 class="title"><a href="">Magni Dolores</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="fa fa-bar-chart"></i></div>
                            <h4 class="title"><a href="">Dolor Sitema</a></h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat tarad limino ata</p>
                        </div> --}}

                    </div>

                    <div class="col-lg-6 order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset($photoAboutUs) }}" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
