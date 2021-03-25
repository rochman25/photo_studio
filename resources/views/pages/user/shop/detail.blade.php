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
                        <li>Nama Product</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="portfolio-details">
            <div class="container">
      
              <div class="portfolio-details-container">
      
                <div class="owl-carousel portfolio-details-carousel">
                  <img src="{{ asset('user_assets/img/portfolio/portfolio-details-1.jpg') }}" class="img-fluid" alt="">
                  <img src="{{ asset('user_assets/img/portfolio/portfolio-details-2.jpg') }}" class="img-fluid" alt="">
                  <img src="{{ asset('user_assets/img/portfolio/portfolio-details-3.jpg') }}" class="img-fluid" alt="">
                </div>
      
                <div class="portfolio-info">
                  <h3>Project information</h3>
                  <ul>
                    <li><strong>Category</strong>: Web design</li>
                    <li><strong>Client</strong>: ASU Company</li>
                    <li><strong>Project date</strong>: 01 March, 2020</li>
                    <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                  </ul>
                </div>
      
              </div>
      
              <div class="portfolio-description">
                <h2>This is an example of portfolio detail</h2>
                <p>
                  Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                </p>
              </div>
            </div>
          </section><!-- End Portfolio Details Section -->
    </main>
@endsection
