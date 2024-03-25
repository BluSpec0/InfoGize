@extends('layouts.admin.app')

@section('content')
    <div class="container" style="margin-top: 5rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Product') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-2">
                                <label for="product_name" style="color: #5F5B00">Nama Produk :</label><br>
                                <input id="product_name" type="text" value="{{ $product->product_name }}"
                                    style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                    placeholder="Masukan Nama Produk" class="form-control" name="product_name" autofocus>
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
                                    <input id="nama" type="text" value="{{ $product->nama }}"
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
                                    <input id="kodepart" type="text" value="{{ $product->kodepart }}"
                                        style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                        placeholder="Masukan Kode Produk" class="form-control" name="kodepart" autofocus>
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
                                    <input id="harga" type="number" value="{{ $product->harga }}"
                                        style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                        placeholder="Masukan Harga Produk" class="form-control" name="harga" autofocus>
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
                                    <input id="stok" type="number" value="{{ $product->stok }}"
                                        style="border-color: #5F5B00; border-width: 1px; border-radius: 5px"
                                        placeholder="Masukan Stok Produk" class="form-control" name="stok" autofocus>
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
                                    <input id="kategori" type="text" value="{{ $product->kategori }}"
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
                                    <input id="lokasiparts" type="text" value="{{ $product->lokasiparts }}"
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
                                    autofocus>{{ $product->product_image }}</input>
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
                                    placeholder="Masukan Keterangan Produk" class="form-control" name="keterangan" autofocus>{{ $product->keterangan }}</textarea>

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
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian1" autofocus>{{ $product->rincian1 }}</textarea>

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
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian2" autofocus>{{ $product->rincian2 }}</textarea>

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
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian3" autofocus>{{ $product->rincian3 }}</textarea>

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
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian4" autofocus>{{ $product->rincian4 }}</textarea>

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
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian5" autofocus>{{ $product->rincian5 }}</textarea>

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
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian6" autofocus>{{ $product->rincian6 }}</textarea>

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
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian7" autofocus>{{ $product->rincian7 }}</textarea>

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
                                    placeholder="Masukan Rincian Produk" class="form-control" name="rincian8" autofocus>{{ $product->rincian8 }}</textarea>

                                <style>
                                    #rincian8::placeholder {
                                        color: #5F5B00;
                                        text-align: center;
                                        opacity: 0.3;
                                    }
                                </style>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="col-md-6 row justify-content-center" style="width: 15%; margin-right: 1px">
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
@endsection
