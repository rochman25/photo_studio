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
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="portfolio-details">
            <div class="">
                <!-- ======= Portfolio Section ======= -->
                <div id="portfolio" class="portfolio">
                    <div class="container" data-aos="fade-up">
                        {{-- <div class="row" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <ul id="portfolio-flters">
                                    <li data-filter="*" class="filter-active">All</li>
                                    <li data-filter=".filter-app">App</li>
                                    <li data-filter=".filter-card">Card</li>
                                    <li data-filter=".filter-web">Web</li>
                                </ul>
                            </div>
                        </div> --}}

                        <div class="row" data-aos="fade-up" data-aos-delay="200">
                            @forelse ($portfolios as $item)
                                <div class="col-lg-12 col-md-12 portfolio-item filter-app">
                                    <img src="{{ asset($item->file_url) }}" class="img-fluid" alt="" loading="lazy">
                                    <div class="portfolio-info">
                                        <h4>{{ $item->nama }}</h4>
                                        <p>{{ $item->caption }}</p>
                                        <a href="{{ public_path($item->file_url) }}" data-gall="portfolioGallery"
                                            class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                                        <a href="{{ route('view.user.portfolio.detail', $item->id) }}"
                                            class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                    </div>
                                </div>
                                {{ $portfolios->links() }}
                            @empty
                                <div class="col-lg-12 col-md-12 portfolio-item filter-app">
                                    <p class="section-description" style="text-align: center">{{ 'Portfolio Masih Kosong.' }}</p>
                                </div>
                            @endforelse
                        </div>

                    </div>
                </div><!-- End Portfolio Section -->
            </div>
        </section>

    </main>
@endsection
