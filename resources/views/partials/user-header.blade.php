<!-- ======= Header ======= -->
<header id="header" class="{{ request()->is('/') ? 'header-transparent' : '' }}">
    <div class="container">

        <div id="logo" class="pull-left">
            <a href="{{ route('view.user.home') }}"><img src="{{ asset('user_assets/img/logo.png') }}" width="42px" style="max-height: 40px" alt=""></a>
            <!-- Uncomment below if you prefer to use a text logo -->
            <!--<h1><a href="#hero">Regna</a></h1>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="{{ request()->is('/') ? 'menu-active' : '' }}"><a href="{{ route('view.user.home') }}">Home</a></li>
                <li class="{{ request()->is('shop') ? 'menu-active' : '' }}"><a href="{{ route('view.user.shop') }}">Shop</a></li>
                <li><a href="">Portfolio</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Contact Us</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- End Header -->
