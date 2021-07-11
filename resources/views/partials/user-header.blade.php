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
                <li class="{{ request()->is('portfolio') ? 'menu-active' : '' }}"><a href="{{ route('view.user.portfolio') }}">Portfolio</a></li>
                <li class="{{ request()->is('about_us') ? 'menu-active' : '' }}"><a href="{{ route('view.user.about_us') }}">About Us</a></li>
                <li class="{{ request()->is('contact_us') ? 'menu-active' : '' }}"><a href="{{ route('view.user.contact_us') }}">Contact Us</a></li>
                @auth
                <li><a href="{{ route('view.home') }}">Dashboard</a></li>    
                @endauth
                
                @guest
                    <li class="{{ request()->is('login') ? 'menu-active' : '' }}"><a href="{{ route('login') }}">Login</a></li>
                @endguest
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- End Header -->
