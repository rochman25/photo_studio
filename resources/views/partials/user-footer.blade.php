<!-- ======= Footer ======= -->
{{-- <footer id="footer">
    <div class="footer-top">
        <div class="container">

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Regna</strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer --> --}}

    <!-- Footer -->
    <footer id="footer" class="footer" style="padding-bottom:0px">
      <!-- Grid container -->
      <div class="p-4">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">{{ $personalisasi[0]['P001']['value'] }}</h5>
  
            <p>
              {{ $personalisasi[0]['P004']['value'] }} <br />
              {{ $personalisasi[0]['P006']['value'] }} <br />           
              {{ $personalisasi[0]['P005']['value'] }}            
            </p>
          </div>
          <!--Grid column-->
  
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Social Media</h5>
  
            <ul class="list-unstyled mb-0">
              <li>
                <a href="{{ $personalisasi[0]['P007']['value'] }}" class="text-white">Facebook</a>
              </li>
              <li>
                <a href="{{ $personalisasi[0]['P008']['value'] }}" class="text-white">Instagram</a>
              </li>
              <li>
                <a href="{{ $personalisasi[0]['P009']['value'] }}" class="text-white">Twitter</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
  
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-0">Customer Service</h5>
  
            <ul class="list-unstyled mt-1">
              <li>
                <a target="_blank" href="https://wa.me/{{ substr_replace(str_replace("-","",$personalisasi[0]['P006']['value']),"62",0,1) }}/?text=Hai%20Kak%20Aku%20butuh%20bantuan%20,...." class="text-white"><img src="{{ asset('user_assets/img/logo-whatsapp.png') }}" width="100px"></a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright
        {{-- <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a> --}}
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->