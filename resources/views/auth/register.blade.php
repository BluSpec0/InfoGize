@extends('layouts.user.login')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-1" style="align-content: center">
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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <input id="name" type="text" style="box-shadow: 0px 0px 2px #5F5B00;"
                                        placeholder="Masukan Nama" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                            <strong>{{ $message }}</strong>
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
                                            <strong>{{ $message }}</strong>
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
                                        style="box-shadow: 0px 0px 2px #5F5B00; color: #5F5B00" name="password_confirmation"
                                        required autocomplete="new-password">

                                    <style>
                                        #password_confirmation::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }

                                        #password_confirmation::first-line {
                                            color: #5F5B00;
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-2">
                                <div class="col-md-6 row justify-content-center" style="width: 30%">
                                    <button type="submit" class="btn btn-primar"
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
                                            href="{{ route('login') }}">{{ __('Masuk.') }}</a>
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
