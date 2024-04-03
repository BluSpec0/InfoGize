@extends('layouts.admin.admin')

<style>
    .nav-link {
        color: black !important;
        font-size: 17px !important
    }

    .nav-link.active {
        border-color: #5F5B00 #5F5B00 white !important;
        color: #5F5B00 !important;
        border-top-left-radius: 10px !important;
        border-top-right-radius: 10px !important;
        font-size: 17px !important
    }

    .nav-tabs {
        border-color: #5F5B00 !important
    }

    .tabs.active {
        border-color: #5F5B00 !important
    }
</style>

@section('content')
    <section id="informasi" style="margin-top: 5rem">
        <div class="container-sm">
            <div>
                <div style="width: 100%">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-biodata-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-biodata" type="button" role="tab" aria-controls="nav-biodata"
                                aria-selected="true">Produk</button>
                        </div>
                    </nav>
                    <div class="tab-content mb-3" id="nav-tabContent"
                        style="width: 100%; border-right: 1px solid #5F5B00; border-left: 1px solid #5F5B00; border-bottom: 1px solid #5F5B00; padding: 1rem; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">
                        <div class="tab-pane fade show active" id="nav-biodata" role="tabpanel"
                            aria-labelledby="nav-biodata-tab">
                            <div class="mb-2">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="search-bar mb-2">
                                        <form action="{{ route('adminpsearch') }}" method="GET">
                                            <div class="search-container">
                                                <input type="text" id="search" name="query"
                                                    placeholder="Cari produk..." class="form-control search-input">
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
                                                border-radius: 5px;
                                                width: 25rem;
                                                padding-left: 40px;
                                                background-image: url('/images/search.svg');
                                                background-repeat: no-repeat;
                                                background-position: 10px center;
                                                background-size: 18px 18px;
                                            }
                                        </style>
                                    </div>
                                    <div class="">
                                        <a class="btn btn-success btn-md mb-3" type="button" data-bs-toggle="modal"
                                            data-bs-target="#biodata"
                                            style="color: #FFFFFF; font-size: 13px; border-radius: 5px;">{{ __('Tambah Data') }}</a>
                                    </div>
                                </div>
                                <div>
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Nama Produk</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Lokasi</th>
                                                <th scope="col">Stok</th>
                                                <th scope="col" class="d-flex justify-content-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->kategori }}</td>
                                                    <td>Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                                                    <td>{{ $product->lokasiparts }}</td>
                                                    <td>{{ $product->stok }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <div class="d-flex gap-2 justify-content-center">
                                                            <a class="btn btn-success btn-md mb-3" type="button"
                                                                href="{{ url('editproduct') }}/{{ $product->id }}"
                                                                style="color: #FFFFFF; font-size: 13px; border-radius: 5px;">{{ __('Ubah') }}</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<section id="ProductAdd">
    <div class="modal fade" id="biodata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="biodata" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"
                        style="color: #5F5B00; font-size: 20px; font-weight: 400;">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div style="padding: 1rem">

                    <div class="card-body">
                        <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="product_name" style="color: #5F5B00">Nama Produk :</label><br>
                                <input id="product_name" type="text"
                                    style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Nama Produk" class="form-control" name="product_name"
                                    autofocus>
                                <style>
                                    #product_name::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group d-flex gap-3 justify-content-between mb-2">
                                <div class="w-100">
                                    <label for="nama" style="color: #5F5B00">Nama Resmi :</label><br>
                                    <input id="nama" type="text"
                                        style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                        placeholder="Masukan Nama Resmi Produk" class="form-control" name="nama"
                                        autofocus>
                                    <style>
                                        #nama::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }
                                    </style>
                                </div>
                                <div class="w-100">
                                    <label for="kodepart" style="color: #5F5B00">Kode Produk :</label><br>
                                    <input id="kodepart" type="text"
                                        style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                        placeholder="Masukan Kode Produk" class="form-control" name="kodepart"
                                        autofocus>
                                    <style>
                                        #kodepart::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="form-group d-flex gap-3 justify-content-between mb-2">
                                <div class="w-100">
                                    <label for="harga" style="color: #5F5B00">Harga :</label><br>
                                    <input id="harga" type="number"
                                        style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                        placeholder="Masukan Harga Produk" class="form-control" name="harga"
                                        autofocus>
                                    <style>
                                        #harga::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }
                                    </style>
                                </div>
                                <div class="w-100">
                                    <label for="stok" style="color: #5F5B00">Stok :</label><br>
                                    <input id="stok" type="number"
                                        style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                        placeholder="Masukan Stok Produk" class="form-control" name="stok"
                                        autofocus>
                                    <style>
                                        #stok::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="form-group d-flex gap-3 justify-content-between mb-2">
                                <div class="w-100">
                                    <label for="kategori" style="color: #5F5B00">Kategori :</label><br>
                                    <input id="kategori" type="text"
                                        style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                        placeholder="Masukan Kategori Produk" class="form-control" name="kategori"
                                        autofocus>
                                    <style>
                                        #kategori::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }
                                    </style>
                                </div>
                                <div class="w-100">
                                    <label for="lokasiparts" style="color: #5F5B00">Lokasi Produk :</label><br>
                                    <input id="lokasiparts" type="text"
                                        style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                        placeholder="Masukan Lokasi Produk" class="form-control" name="lokasiparts"
                                        autofocus>
                                    <style>
                                        #lokasiparts::placeholder {
                                            color: #5F5B00;
                                            text-align: center;
                                            opacity: 0.3;
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="product_image" style="color: #5F5B00">Gambar Produk :</label><br>
                                <input id="product_image" type="file"
                                    style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Gambar Produk" class="form-control" name="product_image"
                                    autofocus>
                                <style>
                                    #product_image::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group mb-2">
                                <label for="keterangan" style="color: #5F5B00">Keterangan Produk :</label><br>
                                <textarea id="keterangan" style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Keterangan Produk" class="form-control" name="keterangan" autofocus></textarea>

                                <style>
                                    #keterangan::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group mb-2">
                                <label for="rincian1" style="color: #5F5B00">*Rincian 1 Produk : </label><br>
                                <textarea id="rincian1" style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian1" autofocus></textarea>

                                <style>
                                    #rincian1::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group mb-2">
                                <label for="rincian2" style="color: #5F5B00">*Rincian 2 Produk : </label><br>
                                <textarea id="rincian2" style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian2" autofocus></textarea>

                                <style>
                                    #rincian2::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group mb-2">
                                <label for="rincian3" style="color: #5F5B00">*Rincian 3 Produk : </label><br>
                                <textarea id="rincian3" style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian3" autofocus></textarea>

                                <style>
                                    #rincian3::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group mb-2">
                                <label for="rincian4" style="color: #5F5B00">*Rincian 4 Produk : </label><br>
                                <textarea id="rincian4" style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian4" autofocus></textarea>

                                <style>
                                    #rincian4::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group mb-2">
                                <label for="rincian5" style="color: #5F5B00">*Rincian 5 Produk : </label><br>
                                <textarea id="rincian5" style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian5" autofocus></textarea>

                                <style>
                                    #rincian5::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group mb-2">
                                <label for="rincian6" style="color: #5F5B00">*Rincian 6 Produk : </label><br>
                                <textarea id="rincian6" style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian6" autofocus></textarea>

                                <style>
                                    #rincian6::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group mb-2">
                                <label for="rincian7" style="color: #5F5B00">*Rincian 7 Produk : </label><br>
                                <textarea id="rincian7" style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian7" autofocus></textarea>

                                <style>
                                    #rincian7::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="form-group mb-3">
                                <label for="rincian8" style="color: #5F5B00">*Rincian 8 Produk : </label><br>
                                <textarea id="rincian8" style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian8" autofocus></textarea>

                                <style>
                                    #rincian8::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
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
</section>
