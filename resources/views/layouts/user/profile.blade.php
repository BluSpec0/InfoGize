<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>InfoGize</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="min-height: 100vh; display: flex; flex-direction: column">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top"
            style="background-color: #5F5B00; box-shadow: 0px 0px 15px #00000047; padding-left: 5rem; padding-right: 5rem; padding-top: 10px; padding-bottom: 10px; z-index: 50;width: 100%;">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand d-flex align-items-center" href="#"><img
                        src="{{ url('/images/nav-logo-wh.png') }}" alt="logo" width="100"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"
                    style="border-color: transparent; color: #5F5B00">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav ms-auto" style="flex-direction: row; gap: 8px;">
                        <div class="d-flex align-items-center" style="margin-right: 1.3rem"><a
                                href="{{ route('cart.view') }}"><img src="{{ url('/images/cart-w.svg') }}" alt="" fill='#fff'
                                    style="width: 27px; padding-right: 0px; padding-left: 0px" class=""></a></div>


                        @if (Auth::user()->avatar)
                            <a href="/profile"><img src="{{ Auth::user()->avatar }}" alt="profile"
                                    class="d-flex justify-content-center"
                                    style="width: 40px; height: 40px; object-position: center; object-fit: cover; align-items: center;
                                background-size: cover; background-position: center; border: 1px solid #5F5B00; border-radius: 5px"></a>
                            <div class="mb-4">
                            @else
                                <a href="/profile"><img src="{{ url('/images/defaultavatar.png') }}" alt="profile"
                                        class="d-flex justify-content-center"
                                        style="width: 40px; height: 40px; object-position: center; object-fit: cover; align-items: center;
                                background-size: cover; background-position: center; border: 1px solid #5F5B00; border-radius: 5px"></a>
                                <div class="mb-4">
                        @endif
                    </div>

                </div>
            </div>
    </div>
    </div>
    </nav>

    <main class="" style="margin-bottom: 4rem">
        @yield('content')
    </main>

    <footer style="background-color: #f2f2f2; padding: 10px; margin-top: auto; width: 100%; text-align: center;">
        <span style="color: #00000055; margin-bottom: 0; vertical-align: middle;">&copy;Copyright 2024
            InfoGize Indonesia</span>
    </footer>


    </div>
</body>

</html>
