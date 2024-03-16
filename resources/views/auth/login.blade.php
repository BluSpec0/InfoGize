@extends('layouts.user.login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="padding: 3rem">
                    <div class="">
                        <div class="" style="">
                            <a href="{{ '/' }}" class="" style="color: #5F5B00;"><img
                                    src="{{ url('/images/backarrow.svg') }}" alt="" width="30"></a>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-3" style="color: #5F5B00; font-size: 30px; font-weight: 400;">
                        {{ __('Ayo Login') }}</div>
                    <div class="row justify-content-center mb-4">
                        <div
                            style="color: #5F5B00; font-size: 15px; font-weight: 400; opacity: 0.5; max-width: 50%; text-align: center">
                            {{ __('Silahkan Login Terlebih Dahulu, dan Nikmati Fitur-Fitur Menarik Lainnya') }}
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-6 row justify-content-center" style="width: 30%">
                                <a class="btn btn-primary btn-sm" type="button" href="{{ '/' }}"
                                    style="background-color: #5F5B00; color: #FFFFFF; font-size: 13px; border-radius: 5px; border-color: #5F5B00">{{ __('Lanjutkan') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
