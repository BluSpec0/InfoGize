@extends('layouts.user.profile')

@section('content')
    <div class="container">
        <div style="padding-top: 3rem">
            <div class="d-flex mb-3">
                <a onclick="window.history.back()" class="" style="margin-top: 1rem">
                    <img src="{{ url('/images/backarrow.svg') }}" alt="" width="30"></a>
            </div>
            <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem"
                class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Alamat Tujuan</h1>
                    <div class="d-flex gap-1" style="font-size: 17px;">
                        <p style="margin-bottom: 0px">{{ Auth::user()->fullname }}</p>
                        <p style="margin-bottom: 0px">(
                            {{ Auth::user()->nohp }})
                        </p>
                    </div>
                    <p style="margin-bottom: 0px">{{ Auth::user()->address }}</p>
                </div>
                <a type="button" data-bs-toggle="modal" data-bs-target="#alamat"
                    style="color: #5F5B00; background-color: #ffffff; border-color: #5F5B00;">Ubah</a>
            </div>

            <!-- Konten yang sudah ada -->
            <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem" class="mb-4">
                <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Metode Pembayaran</h1>
                <div class="payment-options">
                    <div class="payment-option">
                        <label for="transfer_bank" style="display: inline-block; width: 100%;">
                            <div style="border: 1px solid #5F5B00; border-radius: 5px; padding: 0.5rem;">
                                Transfer Bank BNI
                                <a type="button" data-bs-toggle="modal" data-bs-target="#pembayaran"
                                    style="color: #5F5B00; background-color: #ffffff; border-color: #5F5B00; float: right;">Ubah</a>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem" class="mb-4">
                <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Pengiriman</h1>
                <div class="shipping-options">
                    <div class="shipping-option">
                        <label for="express_shipping" style="display: inline-block; width: 100%;">
                            <div style="border: 1px solid #5F5B00; border-radius: 5px; padding: 0.5rem;">
                                J&T Express
                                <a type="button" data-bs-toggle="modal" data-bs-target="#pengiriman"
                                    style="color: #5F5B00; background-color: #ffffff; border-color: #5F5B00; float: right;">Ubah</a>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem; padding-right: 2rem" class="mb-4">
                <div class="d-flex justify-content-between" style="width: 100%">
                    <div class=" gap-1" style="font-size: 17px;">
                        <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Deskripsi Pesanan
                        </h1>
                        <p style="margin-bottom: 0px">{{ $cart->product->product_name }}</p>
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
                                <p style="margin-bottom: 3px">PPN</p>
                                <p style="margin-bottom: 3px">Total</p>
                            </div>
                            <div style="width: fit-content">
                                <p id="totalHarga" style="margin-bottom: 3px"></p>
                                <p style="margin-bottom: 3px">Rp. 5.000,00</p>
                                <p style="margin-bottom: 3px">Rp. 2.000,00</p>
                                <p id="totalHargaPPN" style="margin-bottom: 3px"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border-color: #5F5B00; border-width: 2px;">
                <div class="d-flex justify-content-end">
                    <div style="width: 16rem">
                        <form method="post" action="{{ route('history.add') }}" class="d-flex justify-content-end"
                            style="width: 100%">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $cart->product->id }}">
                            <input id="jumlah" type="number" class="form-control" name="jumlah" value="1"
                                autocomplete="jumlah" autofocus min="1" onchange="hitungTotal()">
                            <script>
                                function hitungTotal() {
                                    var hargaProduk = parseFloat("{{ $cart->product->harga }}");
                                    var jumlah = parseFloat(document.getElementById("jumlah").value);

                                    if (jumlah <= 0) {
                                        jumlah = 1;
                                        document.getElementById("jumlah").value = 1;
                                    }

                                    var totalHarga = hargaProduk * jumlah;

                                    var totalHargaPPN = hargaProduk * jumlah + 5000 + 2000;

                                    document.getElementById("totalHarga").innerText = "Rp. " + totalHarga.toLocaleString('id-ID') + ",00";
                                    document.getElementById("totalHargaPPN").innerText = "Rp. " + totalHargaPPN.toLocaleString('id-ID') + ",00";
                                }
                            </script>
                            <button type="submit" class="btn btn-primary btn-lg col-6 d-flex justify-content-center"
                                style="color: #5F5B00; background-color: #ffffff; border-color: #5F5B00">
                                Bayar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<section id="Address">
    <form action="{{ route('checkout.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal fade" id="alamat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="alamat" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"
                            style="color: #5F5B00; font-size: 20px; font-weight: 400;">Ubah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div style="padding: 1rem">
                        <div class="card-body">
                            <form method="POST"
                                action="{{ route('checkout.update', ['id' => $cart->product->id]) }}">
                                @csrf
                                @method('PUT')

                                <div class="row mb-1"
                                    style="color: #5F5B00; font-size: 20px; font-weight: 400; margin-left: 1px">
                                    {{ __('Alamat') }}
                                </div>
                                <div class=" mb-3 justify-content-center">
                                    <div class="form-group">
                                        <textarea id="address" style="box-shadow: 0px 0px 2px #5F5B00;" placeholder="Masukan Nama" class="form-control"
                                            name="address" autofocus>{{ $user->address }}</textarea>

                                        <style>
                                            #address::placeholder {
                                                color: #5F5B00;
                                                text-align: center;
                                                opacity: 0.3;
                                            }
                                        </style>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="col-md-6 row justify-content-center"
                                        style="width: 15%; margin-right: 1px">
                                        <button type="submit" class="btn btn-primar"
                                            style="background-color: #5F5B00; color: #FFFFFF; font-size: 13px; border-radius: 7px">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<section id="Payment">
    <div class="modal fade" id="pembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="pembayaran" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"
                        style="color: #5F5B00; font-size: 20px; font-weight: 400;">Ubah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div style="padding: 1rem">

                    <div class="card-body">
                        <form method="" action="">
                            <div class="row mb-1 mt-3"
                                style="color: #5F5B00; font-size: 20px; font-weight: 400; margin-left: 1px">
                                {{ __('Pembayaran') }}</div>
                            <div class="mb-3 justify-content-center">
                                <div class="form-group">
                                    <select class="form-select" id="payment_method" name="payment_method"
                                        style="box-shadow: 0px 0px 2px #5F5B00;" required>
                                        <option value="transfer_bank">Bank BRI</option>
                                    </select>

                                    <style>
                                        #payment_method::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }

                                        #payment_method::first-line {
                                            color: #5F5B00;
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="col-md-6 row justify-content-center"
                                    style="width: 15%; margin-right: 1px">
                                    <a data-bs-dismiss="modal" class="btn btn-primar"
                                        style="background-color: #5F5B00; color: #FFFFFF; font-size: 13px; border-radius: 7px">
                                        {{ __('Submit') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="Express">
    <div class="modal fade" id="pengiriman" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="pengiriman" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"
                        style="color: #5F5B00; font-size: 20px; font-weight: 400;">Ubah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div style="padding: 1rem">

                    <div class="card-body">
                        <div class="row mb-1 mt-3"
                            style="color: #5F5B00; font-size: 20px; font-weight: 400; margin-left: 1px">
                            {{ __('Pengiriman') }}</div>
                        <div class="mb-3 justify-content-center">
                            <div class="form-group">
                                <select class="form-select" id="payment_method" name="payment_method"
                                    style="box-shadow: 0px 0px 2px #5F5B00;" required>
                                    <option value="transfer_bank">JNT Express</option>
                                </select>

                                <style>
                                    #payment_method::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }

                                    #payment_method::first-line {
                                        color: #5F5B00;
                                    }
                                </style>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="col-md-6 row justify-content-center" style="width: 15%; margin-right: 1px">
                                <a data-bs-dismiss="modal" class="btn btn-primar"
                                    style="background-color: #5F5B00; color: #FFFFFF; font-size: 13px; border-radius: 7px">
                                    {{ __('Submit') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
