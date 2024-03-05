@extends('layouts.user.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 7rem">
            <div class="col-md-8">
                <div class="card">
                    <div class="row justify-content-center mb-1" style="color: #5F5B00; font-size: 30px; font-weight: 400;">
                        {{ __('Atur Ulang Sandi') }}</div>
                    <div class="row justify-content-center mb-4">
                        <div
                            style="color: #5F5B00; font-size: 15px; font-weight: 400; opacity: 0.5; max-width: 50%; text-align: center">
                            {{ __('Silahkan Ganti Sandi yang Sesuai untuk Akun Anda.') }}
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <input id="email" type="email" style="box-shadow: 0px 0px 2px #5F5B00;"
                                        placeholder="Masukan Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        placeholder="Konfirmasi Sandi"
                                        style="box-shadow: 0px 0px 2px #5F5B00; color: #5F5B00" name="password_confirmation"
                                        required autocomplete="new-password">

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

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
