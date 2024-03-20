@extends('layouts.user.app')

@section('content')
    <div class="container">
        <div style="padding-top: 5rem">
            <div class="d-flex mb-3">
                <a href="{{ url()->previous() }}" class="btn btn-primary "
                    style="color: #fff; background-color: #5F5B00; border-color: #5F5B00">
                    Kembali</a>
            </div>
            <div class=" mt-1">
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
                                    <a href="{{ url()->previous() }}"
                                        class="btn btn-primary btn-lg col-4 d-flex justify-content-center"
                                        style="color: #fff; background-color: #5F5B00; border-color: #5F5B00">
                                        Keranjang</a>
                                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-lg col-4"
                                        style="color: #fff; background-color: #5F5B00; border-color: #5F5B00">
                                        Beli</a>
                                </div>
                            </div>
                            <div class="">
                                <h2 class="mb-4" style="font-size: 23px; font-weight: 400">{{ $product->product_name }}
                                </h2>
                                <div class="mb-4" style="flex-direction: column; gap: 1px;color: #00000080 ">
                                    <p style="margin-bottom: 0px">Nama Resmi Produk : {{ $product->nama }}</p>
                                    <p style="margin-bottom: 0px">Kode Part : {{ $product->kodepart }}</p>
                                    <p style="margin-bottom: 5px">Kategori : {{ $product->kategori }}</p>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>
                                                <form method="post" action="{{ url('order') }}/{{ $product->id }}">
                                                    @csrf
                                                    <input type="number" name="jumlah_pesan" class="form-control"
                                                        required="">
                                                    <button type="submit" class="btn btn-primary mt-2"><i
                                                            class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
