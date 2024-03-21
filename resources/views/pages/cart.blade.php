@extends('layouts.user.profile')

@section('content')
    <section id="keranjang" style="margin-top: 3.7rem">
        <div class="container-sm">
            <div class="d-flex mb-5">
                <a href="{{ '/home' }}" class="" style="margin-top: 1rem">
                    <img src="{{ url('/images/backarrow.svg') }}" alt="" width="30"></a>
            </div>
            <div class="d-flex flex-column">
                @if ($cart->count() > 0)
                    @foreach ($cart as $item)
                        <div class="mb-4">
                            <div class="card flex-md-row w-100"
                                style="border-color: #5F5B00; border-width: 0.5px; box-shadow: 0px 0px 15px #5f5a0040; padding-top: 5px">
                                <img src="{{ $item->product->product_image }}"
                                    class="card-img-right flex-auto d-none d-md-block"
                                    style="padding-right: 20px; max-width: 40vh; max-height: auto; object-position: center; object-fit: scale-down; background-color: #fff; border-color: transparent">

                                <div class="card-body d-flex align-content-around row-cols-1 row">
                                    <h5 class="card-title mb-4" style="font-size: 20px; font-weight: 400">
                                        {{ $item->product->product_name }}</h5>
                                    <div class="mb-4" style="flex-direction: column; gap: 1px;color: #00000050 ">
                                        <p style="margin-bottom: 0px">Nama Resmi Produk : {{ $item->product->nama }}</p>
                                        <p style="margin-bottom: 0px">Kode Part : {{ $item->product->kodepart }}</p>
                                        <p style="margin-bottom: 5px">Kategori : {{ $item->product->kategori }}</p>
                                    </div>
                                    <div>
                                        <div class="d-flex gap-2 justify-content-end align-items-center">
                                            <div class="d-flex align-items-center">
                                                <p style="font-size: 20px; margin: 0%" class="d-flex align-items-center">Rp.
                                                    {{ number_format($item->product->harga * $item->jumlah, 0, ',', '.') }}
                                            </div>
                                            </p>
                                            <a href="{{ url('information-detail') }}/{{ $item->id }}"
                                                class="btn btn-primary "
                                                style="color: #fff; background-color: #5F5B00; border-color: #5F5B00">
                                                Beli</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="" style="">
                                    <form method="POST" action="{{ route('cart.delete', ['id' => $item->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-primary btn-sm col-6 d-flex justify-content-center"
                                            style="color: #fff; background-color: #ffffff; border-color: #ffffff; border-width: 2px; width: 100%">
                                            <img src="{{ url('/images/cancel.svg') }}" alt=""
                                                style="width: 27px; padding-right: 0px; padding-left: 0px; opacity: 0.5;"
                                                class=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex justify-content-center align-content-center" style="font-size: 20px; opacity: 0.3;">
                        <p>Keranjang anda masih kosong.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
