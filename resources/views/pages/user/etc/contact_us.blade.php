@extends('layouts.app_user')
@section('user_pages')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Contact Us</h2>
                    <ol>
                        <li><a href="{{ route('view.user.home') }}">Home</a></li>
                        <li>Contact Us</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="portfolio-details">
            <div class="">
                <!-- ======= Contact Section ======= -->
                <div id="contact">
                    <div class="">
                        <div class="section-header">
                            <h3 class="section-title">Contact</h3>
                            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium doloremque</p>
                        </div>
                    </div>

                    <!-- Uncomment below if you wan to use dynamic maps -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452"
                        width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

                    <div class=" mt-5">
                        <div class="row justify-content-center">

                            <div class="col-lg-3 col-md-4">

                                <div class="info">
                                    <div>
                                        <i class="fa fa-map-marker"></i>
                                        <p>{{ $address }}</p>
                                    </div>

                                    <div>
                                        <i class="fa fa-envelope"></i>
                                        <p>{{ $email }}</p>
                                    </div>

                                    <div>
                                        <i class="fa fa-phone"></i>
                                        <p>{{ $phone }}</p>
                                    </div>
                                </div>

                                <div class="social-links">
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                </div>

                            </div>

                            <div class="col-lg-5 col-md-8">
                                <div class="form">
                                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Your Name" data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars" />
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Your Email" data-rule="email"
                                                data-msg="Please enter a valid email" />
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                placeholder="Subject" data-rule="minlen:4"
                                                data-msg="Please enter at least 8 chars of subject" />
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                                data-msg="Please write something for us" placeholder="Message"></textarea>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Your message has been sent. Thank you!</div>
                                        </div>
                                        <div class="text-center"><button type="submit">Send Message</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Contact Section -->
            </div>
        </section>
    </main>
@endsection
