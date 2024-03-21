@extends('layouts.user.profile')

@section('content')
    <div class="container">
        <div style="padding-top: 5rem">
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

            <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem" class="mb-4">
                <div class="d-flex justify-content-between" style="width: 100%">
                    <div class=" gap-1" style="font-size: 17px;">
                        <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Deskripsi Pesanan</h1>
                        <p style="margin-bottom: 0px">{{ $product->product_name }}</p>
                    </div>
                    <div style="border: 1px solid #5F5B00; border-radius: 5px; padding: 1rem; color: #5F5B00"
                        class="mb-4 d-flex row row-cols-1">
                        <p class="d-flex justify-content-center mb-3" style="margin-bottom: 0px">Ringkasan Pesanan</p>
                        <table>
                            <tr>
                                <td style="padding-bottom: 5px;">Harga Produk</td>
                                <td>Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 5px;">Biaya Ongkir</td>
                                <td>Rp. 5.000</td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 5px;">Total</td>
                                <td>Rp. 5.000</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
