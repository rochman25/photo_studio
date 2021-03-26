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
</main>
@endsection