@extends('layouts.user.app')

@section('content')
    <div class="container">
        <div style="padding-top: 5rem">
            <div class="mt-1">
                <div class="">
                    <div class="">
                        <div class="d-flex flex-row mb-4">
                            <div class="" style="margin-right: 3rem">
                                <div class="mb-4">
                                    <img src="{{ $product->product_image }}"
                                        class="card-img-right flex-auto d-none d-md-block"
                                        style="padding-right: 20px; max-width: 55vh; max-height: auto; object-position: center; object-fit: scale-down; background-color: #fff; border: 1px solid #5F5B00; box-shadow: 0px 0px 15px #5f5a0040; border-radius: 10px">
                                </div>
                                <p class="mb-4 d-flex justify-content-center" style="font-size: 23px; font-weight: 400">
                                    Rp. {{ number_format($product->harga, 0, ',', '.') }}
                                </p>
                                <div class="d-flex justify-content-center gap-3">
                                    <form method="post" action="{{ route('cart.add') }}"
                                        class="d-flex justify-content-center">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input id="jumlah" type="hidden" class="form-control" name="jumlah"
                                            value="1" autocomplete="jumlah" autofocus min="1">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg col-6 d-flex justify-content-center"
                                            style="color: #fff; background-color: #ffffff; border-color: #5F5B00; border-width: 2px; width: 100%">
                                            <img src="{{ url('/images/cart.svg') }}" alt=""
                                                style="width: 27px; padding-right: 0px; padding-left: 0px;"
                                                class=""></button>
                                    </form>
                                    <div>
                                        <a href="{{ url('check-out') }}/{{ $product->id }}"
                                            class="btn btn-lg btn-primary "
                                            style="color: #fff; background-color: #5F5B00; border-color: #5F5B00">
                                            Beli</a>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="width: 100%">
                                <h2 class="mb-4" style="font-size: 23px; font-weight: 400">{{ $product->product_name }}
                                </h2>
                                <div class="mb-4" style="flex-direction: column; gap: 1px;color: #00000080 ">
                                    <p style="margin-bottom: 0px">Nama Resmi Produk : {{ $product->nama }}</p>
                                    <p style="margin-bottom: 0px">Kode Part : {{ $product->kodepart }}</p>
                                    <p style="margin-bottom: 5px">Kategori : {{ $product->kategori }}</p>
                                    <p style="margin-bottom: 5px">Stok : {{ $product->stok }}</p>
                                    <p style="margin-bottom: 5px">{{ $product->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
