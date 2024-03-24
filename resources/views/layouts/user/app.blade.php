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

<style>
    .navbar {
        transition: all 0.2s;
    }

    .navbar-scrolled {
        background-color: #FFFFFF;
        box-shadow: 0px 0px 15px #00000047;
    }
</style>

<body style="min-height: 100vh; display: flex; flex-direction: column">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-scrolled"
            style="padding-left: 5rem; padding-right: 5rem; padding-top: 10px; padding-bottom: 10px; z-index: 50;width: 100%;">
            <div class="container d-flex justify-content-between">
                <a class="d-flex align-items-center" href="#"><img class="navbar-brand"
                        src="{{ url('/images/nav-logo.png') }}" alt="logo" width="100"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"
                    style="border-color: transparent; color: #5F5B00">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="ms-auto">
                        <ul class="navbar-nav me-auto mb-0 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ Auth::check() ? route('home') : '/' }}" style="color: #5F5B00">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('informations') }}"
                                    style="color: #5F5B00;">Informasi</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('products') }}" style="color: #5F5B00">Produk</a>
                            </li>
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/#FAQ"
                                            style="color: #5F5B00">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/#hubungikami"
                                            style="color: #5F5B00">Hubungi
                                            Kami</a>
                                    </li>
                                @endif
                            @else
                                @if (Auth::user()->usertype == 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link " aria-current="page" href="{{ route('history.view') }}"
                                            style="color: #5F5B00">Riwayat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " aria-current="page" href="{{ route('product.create') }}"
                                            style="color: #5F5B00">Admin</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link " aria-current="page" href="{{ route('history.view') }}"
                                            style="color: #5F5B00">Riwayat</a>
                                    </li>
                                @endif
                            @endguest
                        </ul>
                    </div>
                    <div class="navbar-nav ms-auto" style="flex-direction: row; gap: 8px;">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-primary btn-sm btn-login" type="button" data-bs-toggle="modal"
                                        data-bs-target="#login"
                                        style="background-color: #5F5B00; color: #FFFFFF; font-size: 13px; border-radius: 5px; border-color: #5F5B00">{{ __('Masuk') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="modal"
                                        style="background-color: #FFFFFF; color: #5F5B00; font-size: 13px; border-radius: 5px; border-color: #5F5B00"
                                        data-bs-target="#register">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="d-flex align-items-center" style="margin-right: 1.3rem"><a
                                    href="{{ route('cart.view') }}"><img src="{{ url('/images/cart.svg') }}"
                                        alt="" style="width: 27px; padding-right: 0px; padding-left: 0px"
                                        class="cart"></a></div>

                            @if (Auth::user()->avatar)
                                <a href="{{ route('profile') }}"><img src="{{ Auth::user()->avatar }}" alt="profile"
                                        class="d-flex justify-content-center avatar"
                                        style="width: 40px; height: 40px; object-position: center; object-fit: cover; align-items: center;
                                background-size: cover; background-position: center; border: 1px solid #5F5B00; border-radius: 5px"></a>
                                <div class="mb-4">
                                @else
                                    <a href="{{ route('profile') }}"><img src="{{ url('/images/defaultavatar.png') }}"
                                            alt="profile" class="d-flex justify-content-center avatar"
                                            style="width: 40px; height: 40px; object-position: center; object-fit: cover; align-items: center;
                                background-size: cover; background-position: center; border: 1px solid #5F5B00; border-radius: 5px"></a>
                                    <div class="mb-4">
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <script>
            window.addEventListener('scroll', () => {
                // Check if the current page is the home page or info page
                const isHomePage = window.location.pathname === '/';
                const isInfoPage = window.location.pathname === '/home';

                if (isHomePage || isInfoPage) {
                    const navLogo = document.querySelector('.navbar-brand');
                    const navEl = document.querySelector('.navbar');
                    const navLinks = document.querySelectorAll('.nav-link');
                    const cartImg = document.querySelector('.cart');
                    const avatarImg = document.querySelector('.avatar');
                    const loginBtn = document.querySelector('.btn-login');

                    if (window.scrollY >= 10) {
                        navEl.classList.add('navbar-scrolled');
                        navLogo.src = "{{ url('/images/nav-logo.png') }}";
                        navLinks.forEach(link => {
                            link.style.color = '#5F5B00';
                        });
                        cartImg.src = "{{ url('/images/cart.svg') }}";
                        avatarImg.style.borderColor = '#5F5B00';
                        loginBtn.style.borderColor = '#5F5B00';
                        loginBtn.style.color = '#5F5B00';
                    } else {
                        navEl.classList.remove('navbar-scrolled');
                        navLogo.src = "{{ url('/images/nav-logo-wh.png') }}";
                        navLinks.forEach(link => {
                            link.style.color = '#FFF';
                        });
                        cartImg.src = "{{ url('/images/cart-w.svg') }}";
                        avatarImg.style.borderColor = '#FFFFFF';
                        loginBtn.style.borderColor = '#FFFFFF';
                        loginBtn.style.color = '#FFF';
                    }
                }
            });
        </script>


        <main class="" style="margin-bottom: 4rem; min-height: 70vh;">
            @yield('content')
        </main>

        <footer class="footer mt-auto py-5" style="background-color: #5F5B00; margin-top: auto">
            <div class="container d-flex justify-content-center" style="opacity: 0.75">
                <div class="row row-cols-1">
                    <div class="d-flex justify-content-center" style="margin-bottom: 2.5rem">
                        <img src="{{ url('/images/footerlogo.png') }}" alt="" width="180">
                    </div>

                    <div class="d-flex flex-row justify-content-center"
                        style="font-size: 17px; flex-direction: row; gap: 2rem; text-transform: uppercase; margin-bottom: 2.5rem">
                        <a class="nav-link " href="{{ Auth::check() ? route('home') : '/' }}"
                            style="color: #FFFFFF">Beranda</a>
                        <a class="nav-link " href="{{ route('informations') }}"
                            style="color: #FFFFFF;">Informasi</a>
                        <a class="nav-link " href="{{ route('products') }}" style="color: #FFFFFF;">Produk</a>
                        <a class="nav-link " href="{{ Auth::check() ? url('/home#FAQ') : '/#FAQ' }}"
                            style="color: #FFFFFF;">FAQ</a>
                        <a class="nav-link " href="{{ Auth::check() ? url('/home#hubungikami') : '/#hubungikami' }}"
                            style="color: #FFFFFF;">Hubungi Kami</a>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <h4 style="color: #FFFFFF; font-weight: 400">Tersedia Produk</h4>
                    </div>

                    <div class="d-flex justify-content-center align-items-center gap-5" style="margin-bottom: 3rem">
                        <img src="{{ url('/images/footer1.png') }}" alt="" height="40">
                        <img src="{{ url('/images/footer2.png') }}" alt="" height="35">
                        <img src="{{ url('/images/footer3.png') }}" alt="" height="35">
                        <img src="{{ url('/images/footer4.png') }}" alt="" height="20">
                    </div>

                    <div class="d-flex justify-content-evenly gap-4">
                        <div class="d-flex flex-row gap-1 align-items-center">
                            <img src="{{ url('/images/instagram.svg') }}" alt="" width="20"
                                style="vertical-align: middle;">
                            <p style="color: #FFFFFF; margin-bottom: 0; vertical-align: middle;">InfoGize.official.id
                            </p>
                        </div>

                        <div>
                            <span style="color: #FFFFFF; margin-bottom: 0; vertical-align: middle;">&copy;Copyright
                                2024
                                InfoGize Indonesia</span>
                        </div>

                        <div>
                            <p style="color: #FFFFFF; margin-bottom: 0; vertical-align: middle;">InfoGize@gmail.com</p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

</body>

<section id="masuk">
    <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div style="padding: 3rem">
                    <div class="">
                        <div class="" style="">
                            <a class="" style="color: #5F5B00;" data-bs-dismiss="modal"><img
                                    src="{{ url('/images/backarrow.svg') }}" alt="" width="30"></a>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-1"
                        style="color: #5F5B00; font-size: 30px; font-weight: 400;">
                        {{ __('Selamat Datang Kembali!') }}</div>
                    <div class="row justify-content-center mb-3">
                        <div
                            style="color: #5F5B00; font-size: 15px; font-weight: 400; opacity: 0.5; max-width: 50%; text-align: center">
                            {{ __('Silahkan Masukan Informasi Akun Anda Untuk Melanjutkan.') }}
                        </div>
                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <input id="email" type="email" style="box-shadow: 0px 0px 2px #5F5B00;"
                                        placeholder="Masukan E-mail"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    <style>
                                        #email::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }

                                        #email::first-line {
                                            color: #5F5B00;
                                        }
                                    </style>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <p>Email atau password salah</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Masukan Sandi"
                                        style="box-shadow: 0px 0px 2px #5F5B00; color: #5F5B00"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" autofocus>

                                    <style>
                                        #password::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }

                                        #password::first-line {
                                            color: #5F5B00;
                                        }
                                    </style>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <p>Password tidak sesuai</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-5 justify-content-center">
                                <div class="col-md-6 d-flex justify-content-end">
                                    @if (Route::has('password.request'))
                                        <a class="btn row" type="button" data-bs-toggle="modal"
                                            data-bs-target="#reset" style="color: #5F5B00; font-size: 13px;">
                                            {{ __('Forget Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="row justify-content-center mb-2">
                                <div class="col-md-6 row justify-content-center" style="width: 30%">
                                    <button type="submit" class="btn btn-primar"
                                        style="background-color: #5F5B00; color: #FFFFFF; font-size: 15px; border-radius: 12px">
                                        {{ __('Masuk') }}
                                    </button>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="row justify-content-center"
                                    style="width: 100%; flex-direction: row; text-align: center; font-size: 13px;">
                                    <p>Belum punya akun?
                                        <a class="" style="color: #5F5B00; font-size: 13px; font-weight: 600"
                                            type="button" data-bs-toggle="modal"
                                            data-bs-target="#register">{{ __('Daftar.') }}</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="daftar">
    <div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div style="padding: 3rem">
                    <div class="">
                        <div class="" style="">
                            <a class="" style="color: #5F5B00;" data-bs-dismiss="modal"><img
                                    src="{{ url('/images/backarrow.svg') }}" alt="" width="30"></a>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-1"
                        style="color: #5F5B00; font-size: 30px; font-weight: 400;">
                        {{ __('Selamat Datang Kembali!') }}</div>
                    <div class="row justify-content-center mb-3">
                        <div
                            style="color: #5F5B00; font-size: 15px; font-weight: 400; opacity: 0.5; max-width: 50%; text-align: center">
                            {{ __('Silahkan Masukan Informasi Akun Anda Untuk Melanjutkan.') }}
                        </div>
                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <input id="name" type="text" style="box-shadow: 0px 0px 2px #5F5B00;"
                                        placeholder="Masukan Nama"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <style>
                                        #name::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }

                                        #name::first-line {
                                            color: #5F5B00;
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="Masukan E-Mail"
                                        style="box-shadow: 0px 0px 2px #5F5B00; color: #5F5B00"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    <style>
                                        #email::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }

                                        #email::first-line {
                                            color: #5F5B00;
                                        }
                                    </style>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <p>Email sudah digunakan</p>
                                        </span>
                                    @enderror


                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Masukan Sandi"
                                        style="box-shadow: 0px 0px 2px #5F5B00; color: #5F5B00"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                    @enderror

                                    <style>
                                        #password::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }

                                        #password::first-line {
                                            color: #5F5B00;
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="row mb-5 justify-content-center">

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        placeholder="Konfirmasi Sandi"
                                        style="box-shadow: 0px 0px 2px #5F5B00; color: #5F5B00"
                                        name="password_confirmation" required autocomplete="new-password">

                                    <style>
                                        #password-confirm::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }

                                        #password-confirm::first-line {
                                            color: #5F5B00;
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-2">
                                <div class="col-md-6 row justify-content-center" style="width: 30%">
                                    <button type="submit" class="btn"
                                        style="background-color: #5F5B00; color: #FFFFFF; font-size: 15px; border-radius: 12px">
                                        {{ __('Daftar') }}
                                    </button>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="row justify-content-center"
                                    style="width: 100%; flex-direction: row; text-align: center; font-size: 13px;">
                                    <p>Sudah punya akun?
                                        <a class="" style="color: #5F5B00; font-size: 13px; font-weight: 600"
                                            type="button" data-bs-toggle="modal"
                                            data-bs-target="#login">{{ __('Masuk.') }}</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="forget">
    <div class="modal fade" id="reset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="reset" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div style="padding: 3rem">
                    <div class="">
                        <div class="" style="">
                            <a class="" style="color: #5F5B00;" data-bs-dismiss="modal"><img
                                    src="{{ url('/images/backarrow.svg') }}" alt="" width="30"></a>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-1"
                        style="color: #5F5B00; font-size: 30px; font-weight: 400;">
                        {{ __('Atur Ulang Sandi') }}</div>
                    <div class="row justify-content-center mb-4">
                        <div
                            style="color: #5F5B00; font-size: 15px; font-weight: 400; opacity: 0.5; max-width: 50%; text-align: center">
                            {{ __('Silahkan Masukan Email Akun Anda Untuk Melanjutkan.') }}
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <input id="email" type="email" style="box-shadow: 0px 0px 2px #5F5B00;"
                                        placeholder="Masukan E-mail"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    <style>
                                        #email::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }

                                        #email::first-line {
                                            color: #5F5B00;
                                        }
                                    </style>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primar"
                                        style="background-color: #5F5B00; color: #FFFFFF; font-size: 15px; border-radius: 5px">
                                        {{ __('Kirim email reset password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</html>
