@extends('layouts.user.profile')

@section('content')
    <div class="container">
        <div style="padding-top: 5rem">
            <div class="d-flex mb-3">
                <a onclick="window.history.back()" class="" style="margin-top: 1rem">
                    <img src="{{ url('/images/backarrow.svg') }}" alt="" width="30"></a>
            </div>
            <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem" class="mb-4">
                <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Alamat Tujuan</h1>
                <div class="d-flex gap-1" style="font-size: 17px;">
                    <p style="margin-bottom: 0px">{{ Auth::user()->fullname }}</p>
                    <p style="margin-bottom: 0px">(
                        {{ Auth::user()->nohp }})
                    </p>
                </div>
                <p style="margin-bottom: 0px">{{ Auth::user()->address }}</p>
            </div>

            <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem" class="mb-4">
                <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Metode Pembayaran</h1>
                <div class="d-flex gap-1" style="font-size: 17px;">
                    <p style="margin-bottom: 0px">{{ Auth::user()->fullname }}</p>
                    <p style="margin-bottom: 0px">(
                        {{ Auth::user()->nohp }})
                    </p>
                </div>
                <p style="margin-bottom: 0px">{{ Auth::user()->address }}</p>
            </div>

            <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem; padding-right: 2rem" class="mb-4">
                <div class="d-flex justify-content-between" style="width: 100%">
                    <div class=" gap-1" style="font-size: 17px;">
                        <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Deskripsi Pesanan</h1>
                        <p style="margin-bottom: 0px">{{ $product->product_name }}</p>
                    </div>
                    <div style="border: 1px solid #5F5B00; border-radius: 5px; padding-top: 1rem; padding-bottom: 1rem; color: #5F5B00; width: 16.5rem"
                        class="mb-4 d-flex row row-cols-1">
                        <div class="d-flex justify-content-center">
                            <p class="mb-3 col-6" style="width: fit-content;">
                                Ringkasan Pesanan</p>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-between">
                            <div style="width: fit-content;">
                                <p style="margin-bottom: 3px">Harga Produk</p>
                                <p style="margin-bottom: 3px">Jasa Kirim</p>
                                <p style="margin-bottom: 3px">Total</p>
                            </div>
                            <div style="width: fit-content">
                                <p style="margin-bottom: 3px">Rp. {{ number_format($product->harga, 0, ',', '.') }},00</p>
                                <p style="margin-bottom: 3px">Rp. 5.000,00</p>
                                <p style="margin-bottom: 3px">Rp.
                                    {{ number_format($product->harga + 5000, 0, ',', '.') }},00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border-color: #5F5B00; border-width: 2px;">
                <div class="d-flex justify-content-end">
                    <a href="{{ url('check-out') }}/{{ $product->id }}" class="btn btn-lg btn-primary "
                        style="color: #5F5B00; background-color: #ffffff; border-color: #5F5B00">
                        Bayar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
