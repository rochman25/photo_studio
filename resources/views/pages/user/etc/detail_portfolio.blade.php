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
                            @if(isset($portfolio))
                            <div class="col-lg-12 col-md-12 portfolio-item filter-app">
                                @if(isset($portfolio->file_url))
                                    <img src="{{ asset($portfolio->file_url) }}" class="img-fluid" alt="" loading="lazy">
                                @endif
                                <div class="portfolio-info">
                                    <h4>{{ $portfolio->nama ?? "" }}</h4>
                                    <p>{{ $portfolio->caption ?? "" }}</p>
                                    <a href="{{ asset($portfolio->file_url) }}" data-gall="portfolioGallery"
                                        class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                            @foreach ($portfolio->images as $item)
                                <div class="col-lg-12 col-md-12 portfolio-item filter-web">
                                    <img src="{{ asset($item->file_url) }}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <a href="{{ asset($item->file_url) }}" data-gall="portfolioGallery"
                                            class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <div class="col-lg-12">
                                Portfolio tidak dapat kami temukan.
                            </div>
                            @endif
                        </div>

                    </div>
                </div><!-- End Portfolio Section -->
            </div>
        </section>

    </main>
@endsection
