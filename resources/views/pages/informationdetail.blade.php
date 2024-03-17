@extends('layouts.user.app')

@section('content')
    <div class="container">
        <div class="row" style="padding-top: 7rem">
            <div class="col-md-12 mt-1">
                <div class="mb-4">
                    <div class="card flex-md-row w-100 mb-4"
                        style="border-color: #5F5B00; border-width: 0.5px; box-shadow: 0px 0px 15px #5f5a0040; padding-top: 5px">
                        <div class="card-body d-flex align-content-around row-cols-1 row">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="card-title mb-3" style="font-size: 23px; font-weight: 400">
                                        {{ $product->product_name }}</h5>
                                    <p class="mb-2" style="font-size: 15px; font-weight: 400">{{ $product->lokasiparts }}
                                    </p>
                                    <p class="mb-2" style="font-size: 20px; font-weight: 400">Rp.
                                        {{ number_format($product->harga) }}
                                    </p>
                                    <div class="mb-4" style="flex-direction: column; gap: 1px;color: #00000070 ">
                                        <p style="margin-bottom: 0px">Nama Resmi Produk: {{ $product->nama }}</p>
                                        <p style="margin-bottom: 0px">Kode Part: {{ $product->kodepart }}</p>
                                        <p style="margin-bottom: 5px">Kategori: {{ $product->kategori }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <a href="{{ url('information-detail') }}/{{ $product->id }}"
                                            class="btn btn-primary "
                                            style="color: #fff; background-color: #5F5B00; border-color: #5F5B00; width: 6rem; border-radius: 10px">
                                            Beli</a>
                                    </div>
                                    <p style="text-align: justify;">{{ $product->keterangan }}</p>
                                </div>
                                <img src="{{ url('uploads') }}/{{ $product->product_image }}"
                                    class="card-img-right flex-auto d-none d-md-block"
                                    style="padding-right: 20px; max-width: 50vh; max-height: auto; object-position: center; object-fit: scale-down; background-color: #fff; border-color: transparent">
                            </div>

                            <p>Berikut adalah deskripsi rinci dan detail dari {{ $product->product_name }} :</p>
                            <div style="text-align: justify; flex-direction: column; gap: 1px;color: #00000070 ">
                                <ul>
                                    <li>{{ $product->rincian1 }}</li>
                                    <li>{{ $product->rincian2 }}</li>
                                    <li>{{ $product->rincian3 }}</li>
                                    <li>{{ $product->rincian4 }}</li>
                                    <li>{{ $product->rincian5 }}</li>
                                    <li>{{ $product->rincian6 }}</li>
                                    <li>{{ $product->rincian7 }}</li>
                                    <li>{{ $product->rincian8 }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ url()->previous() }}" class="btn btn-primary "
                            style="color: #fff; background-color: #5F5B00; border-color: #5F5B00">
                            Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
