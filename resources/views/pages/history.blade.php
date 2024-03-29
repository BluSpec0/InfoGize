@extends('layouts.user.app')

@section('content')
    <section id="informasi" style="margin-top: 5rem">
        <div class="container-sm">
            <div class="d-flex flex-column">
                @if ($histori->count() > 0)
                    @foreach ($histori as $item)
                        <div class="mb-4">
                            <div class="card w-100"
                                style="border-color: #5F5B00; border-width: 0.5px; box-shadow: 0px 0px 15px #5f5a0040; padding: 0px">
                                <div class="d-flex justify-content-between card-header"
                                    style="background-color: white; border-color: #5F5B00; border-bottom-width: 0.5px">
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="{{ url('/images/bag.svg') }}" alt="" width="20">
                                        <p class=""
                                            style="margin: 0%; color: #5F5B00; font-size: 16px; font-weight: 300">
                                            Belanja</p>
                                    </div>
                                    <div>
                                        <p
                                            style="color: #5F5B00; margin: 0px; font-size: 16px; font-weight: 300; text-transform: capitalize">
                                            {{ $item->status }}</p>
                                    </div>
                                </div>
                                <div style="padding: 10px" class="d-flex gap-4">
                                    <img src="{{ $item->product->product_image }}" alt="profile"
                                        class="d-flex justify-content-center"
                                        style="width: 80px; height: 80px; object-position: center; object-fit: cover; align-items: center;
                                background-size: cover; background-position: center; border: 1px solid #5F5B00; border-radius: 5px">
                                    <div>
                                        <h1 class="" style="font-size: 20px; font-weight: 400; margin: 0%">
                                            {{ $item->product->product_name }}</h1>
                                        <p>{{ $item->jumlah }} Barang</p>
                                    </div>
                                </div>
                                <div style="padding: 10px" class="d-flex justify-content-between">
                                    <div style="font-size: 17px">
                                        <p style="margin: 0%">Total Belanja</p>
                                        <p style="margin: 0%">Rp.
                                            {{ number_format($item->product->harga * $item->jumlah + 7000, 0, ',', '.') }}</p>
                                    </div>
                                    <a href="{{ url('payment') }}/{{ $item->id }}" class="btn btn-primary align-items-center"
                                        style="color: #fff; background-color: #5F5B00; border-color: #5F5B00; height: fit-content;">
                                        Detail Pesanan</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex justify-content-center align-content-center" style="font-size: 20px; opacity: 0.3;">
                        <p>Riwayat anda masih kosong.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
