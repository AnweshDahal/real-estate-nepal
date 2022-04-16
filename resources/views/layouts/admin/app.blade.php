<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Chart.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Leaflet.js --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <style>
        * {
            font-family: 'Space Grotesk', sans-serif;
        }

        .map-container {
            height: 500px;
            width: 100%;
        }

        #map {
            position: relative;
            height: 500px;
            cursor: pointer;
            border-radius: 0.4em;
        }

        .localities-table {
            max-height: 240px !important;
            overflow-y: scroll;
            position: relative;
        }

        .localities-table::-webkit-scrollbar {
            width: 5px;
            margin-right: -5px;
        }

        .localities-table::-webkit-scrollbar-track {
            background: transparent;
        }

        .localities-table::-webkit-scrollbar-thumb {
            background-color: #29292955;
            max-height: 130px;
            border-radius: 5px;
        }

        .t-head{
            position: absolute;
            top: 0;
            left: 0;
            z-index: 10000;

        }

    </style>

    <title>@yield('title')</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">REN Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu"
                aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mobileMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                            href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user.index') }}">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.property.index') }}">Properties</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="localityDD" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Locality
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="localityDD">
                            <li><a class="dropdown-item" href="{{ route('admin.locality.index') }}">View All
                                    Localities</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.locality.create') }}">Add Locality</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.image.index') }}">Images</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="flex-shrink-0">
        <div class="container mt-4">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error </strong> {{ Session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield ('contents')
        </div>
    </main>
    <footer class="footer sticky-bottom mt-auto py-3 text-white bg-dark">
        <div class="container">
            <div class="text-muted text-center">&copy 2021 - {{ Carbon\Carbon::now()->year }} Real Estate Nepal &
                Anwesh Dahal</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    @yield('scripts')
</body>

</html>
