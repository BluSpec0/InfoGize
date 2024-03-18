@extends('layouts.user.app')

@section('content')
    <section id="informasi" style="margin-top: 5rem">
        <div class="container-sm">
            <div class="d-flex flex-row justify-content-between">
                <div class="mb-3">
                    <h1
                        style="color: #5F5B00; letter-spacing: 0.5px; font-size: 25px; border-bottom: 2px solid #5F5B00; display: inline-block; font-weight: 400">
                        Informasi
                    </h1>
                </div>
                <div class="search-bar mb-3">
                    <form action="{{ route('infosearch') }}" method="GET">
                        <div class="search-container">
                            <input type="text" id="search" name="query" placeholder="Cari produk..."
                                class="form-control search-input">
                        </div>
                    </form>

                    <style>
                        #search::placeholder {
                            color: #5F5B00;
                            opacity: 0.4;
                        }

                        #search::first-line {
                            color: #5F5B00;
                        }

                        .search-container {
                            position: relative;
                        }

                        .search-input {
                            border-color: #5F5B00;
                            border-width: 1.5px;
                            border-radius: 15px;
                            width: 25rem;
                            padding-left: 40px;
                            background-image: url('/images/search.svg');
                            background-repeat: no-repeat;
                            background-position: 10px center;
                            background-size: 18px 18px;
                        }
                    </style>

                </div>
            </div>
            <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="product_name">Product Name:</label><br>
                <input type="text" id="product_name" name="product_name"><br>

                <label for="harga">Harga:</label><br>
                <input type="text" id="harga" name="harga"><br>

                <label for="stok">Stok:</label><br>
                <input type="text" id="stok" name="stok"><br>

                <label for="nama">Nama:</label><br>
                <input type="text" id="nama" name="nama"><br>

                <label for="kodepart">Kodepart:</label><br>
                <input type="text" id="kodepart" name="kodepart"><br>

                <label for="kategori">Kategori:</label><br>
                <input type="text" id="kategori" name="kategori"><br>

                <label for="lokasiparts">Lokasiparts:</label><br>
                <input type="text" id="lokasiparts" name="lokasiparts"><br>

                <label for="keterangan">Keterangan:</label><br>
                <input type="text" id="keterangan" name="keterangan"><br>

                <label for="rincian1">Rincian1:</label><br>
                <input type="text" id="rincian1" name="rincian1"><br>

                <label for="rincian2">Rincian2:</label><br>
                <input type="text" id="rincian2" name="rincian2"><br>

                <label for="rincian3">Rincian3:</label><br>
                <input type="text" id="rincian3" name="rincian3"><br>

                <label for="rincian4">Rincian4:</label><br>
                <input type="text" id="rincian4" name="rincian4"><br>

                <label for="rincian5">Rincian5:</label><br>
                <input type="text" id="rincian5" name="rincian5"><br>

                <label for="rincian6">Rincian6:</label><br>
                <input type="text" id="rincian6" name="rincian6"><br>

                <label for="rincian7">Rincian7:</label><br>
                <input type="text" id="rincian7" name="rincian7"><br>

                <label for="rincian8">Rincian8:</label><br>
                <input type="text" id="rincian8" name="rincian8"><br>

                <label for="product_image">Product Image:</label><br>
                <input type="file" id="product_image" name="product_image"><br><br>

                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
@endsection
