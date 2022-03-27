<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="PRAGMA" content="NO-CACHE"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Manrope:wght@700;800&display=swap"
        rel="stylesheet">

    <!--Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <!-- Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>


    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>@yield('title')</title>


</head>

<body>
    <header>
        <div class="row">
            <nav class="col-12 col-lg-4 d-flex align-items-center">
                @auth
                    <a href="{{ url('/home') }}" class="nav-link mr-2">Home</a>
                @endauth
                <a href="{{ route('property.index', ['type' => 'buy']) }}" class="nav-link">Buy</a>
                <a href="{{ route('property.index', ['type' => 'rent']) }}" class="nav-link">Rent</a>
                <a href="#" class="nav-link">About Us</a>
                <a href="#" class="nav-link">Contact Us</a>
            </nav>
            <div class="brand-logo col-12 col-lg-4  d-flex align-items-center justify-content-center">
                <a href="{{ route('home') }}" class="brand-name extra-bold">RealEstate <span class="text-theme-blue">Nepal</span></a>
            </div>
            {{-- Displayed only if the route for login has been defined --}}
            @if (Route::has('login'))
                <div class="account-controls col-12 col-lg-4 d-flex align-items-center justify-content-end">
                    {{-- Displayed if a user has been authenticated --}}
                    @auth

                        <a href="{{ route('property.create') }}" class="nav-link mr-2">Add Listing</a>
                        <a href="{{ route('logout') }}" id="logout" class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Sign Out</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link account-control-link">Sign In</a>

                        {{-- Displayed only if the route for Register has been defined --}}
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link account-control-link">Sign Up</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>
    <div class="main">
        @yield('content')
    </div>
    <footer>
        <div class="footer-top">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-3">
                    <p class="section-title semi-bold">
                        RealEstate Nepal
                    </p>
                    <p class="medium">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id tempore nemo libero
                        voluptatibus? Corporis, sint, saepe, voluptatum magnam provident sapiente beatae deserunt
                        ipsum doloribus aspernatur eveniet reprehenderit distinctio iure.
                    </p>
                </div>
                <div class="col-12 col-md-12 col-lg-2">
                    <ul class="footer-links">
                        <li class="medium"><a href="#">Buy Properties</a></li>
                        <li class="medium"><a href="#">Sell Properties</a></li>
                        <li class="medium"><a href="#">Rent Properties</a></li>
                        @if (Route::has('register'))
                            <li class="medium"><a href="#">Register</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-12 col-md-12 col-lg-2">
                    <ul class="footer-links">
                        <li class="medium">About Us</li>
                        <li><a href="#">Get to Know Us</a></li>
                        <li><a href="#">Work With Us</a></li>
                        <li><a href="#">Company Information</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-12 col-lg-5 d-flex align-items-start justify-content-end ">
                    <div>
                        <div class="medium mb-2">Socials</div>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex align-items-center justify-content-center p-4 bg-theme-accent-1">
            <p class="m-0 p-0">
                2022 RealEstate Nepal &middot; Made With <span class="emoji">&#10084;&#65039;</span> By&nbsp;<a
                    href="https://github.com/AnweshDahal" class="link text-light">Anwesh Dahal</a>
            </p>
        </div>
    </footer>
    <div class="d-none">
        <form action="{{ route('logout') }}" method="post" id="logoutForm">
            @csrf
        </form>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    @yield('scripts')
</body>

</html>
