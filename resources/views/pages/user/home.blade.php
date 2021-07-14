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
                    @foreach ($heros as $index => $item)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="active"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @forelse ($heros as $index => $item)
                        <div class="carousel-item @if($index == 0) active @endif">
                            <img class="d-block w-100" style="height: 100vh" src="{{ asset($item->file_url) }}"
                                alt="First slide">
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <img class="d-block w-100" style="height: 100vh" src="{{ asset('img/hero_1.png') }}"
                                alt="First slide">
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
                            <img src="{{ asset($item->file_url) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $item->nama }}</h4>
                                <p>{{ $item->caption }}</p>
                                <a href="{{ asset($item->file_url) }}" data-gall="portfolioGallery"
                                    class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                                <a href="{{ route('view.user.portfolio.detail',$item->id) }}" class="details-link" title="More Details"><i
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

                    </div>

                    <div class="col-lg-6 order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset($photoAboutUs) }}" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
