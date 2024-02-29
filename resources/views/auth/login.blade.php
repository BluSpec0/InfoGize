@extends('layouts.user.login')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5" style="align-content: center">
            <div class="col-md-8 mx-auto">
                <div class="card mx-auto"
                    style="padding-top: 2rem; padding-bottom: 4rem; box-shadow: 0px 3px 20px #5f5a0058;">
                    <div class="">
                        <div class="" style="padding-left: 2rem; margin-bottom: 2rem;">
                            <button class="btn btn-primary flex-grow-1"
                                style="background-color: #5F5B00; color: #FFFFFF; font-size: 13px; border-radius: 12px; border-color: #5F5B00"
                                onclick="window.history.back()">{{ __('Kembali') }}</button>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-1" style="color: #5F5B00; font-size: 36px; font-weight: 500;">
                        {{ __('Selamat Datang Kembali!') }}</div>
                    <div class="row justify-content-center mb-3">
                        <div
                            style="color: #5F5B00; font-size: 17px; font-weight: 500; opacity: 0.5; max-width: 40%; text-align: center">
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
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Masukan Sandi"
                                        style="box-shadow: 0px 0px 2px #5F5B00; color: #5F5B00"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

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
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-5 justify-content-center">
                                <div class="col-md-6 d-flex justify-content-end">
                                    @if (Route::has('password.request'))
                                        <a class="btn row" href="{{ route('password.request') }}"
                                            style="color: #5F5B00; font-size: 13px;">
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
                                            href="{{ route('register') }}">{{ __('Daftar.') }}</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
