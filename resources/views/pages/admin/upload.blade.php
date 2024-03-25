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
                            <button class="nav-link" id="nav-alamat-tab" data-bs-toggle="tab" data-bs-target="#nav-alamat"
                                type="button" role="tab" aria-controls="nav-alamat"
                                aria-selected="false">Pembayaran</button>
                            <button class="nav-link" id="nav-lainnya-tab" data-bs-toggle="tab" data-bs-target="#nav-lainnya"
                                type="button" role="tab" aria-controls="nav-lainnya"
                                aria-selected="false">Lainnya</button>
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
                                    <table class="table">
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
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <a class="btn btn-success btn-md mb-3" type="button"
                                                                href="{{ url('editproduct') }}/{{ $product->id }}"
                                                                style="color: #FFFFFF; font-size: 13px; border-radius: 5px;">{{ __('Ubah') }}</a>
                                                            <a class="btn btn-danger btn-md mb-3" type="button"
                                                                data-bs-toggle="modal" data-bs-target="#biodata"
                                                                style="color: #FFFFFF; font-size: 13px; border-radius: 5px;">{{ __('Hapus') }}</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-alamat" role="tabpanel" aria-labelledby="nav-alamat-tab">
                            <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem" class="mb-4">
                                <div class="d-flex gap-1" style="font-size: 17px;">
                                    <p style="margin-bottom: 0px">{{ Auth::user()->fullname ?: 'Nama Belum Di Masukan' }}
                                    </p>
                                    <p style="margin-bottom: 0px">
                                        (
                                        @if (Auth::user()->nohp)
                                            {{ substr(Auth::user()->nohp, 0, 3) }}<span>*****</span>{{ substr(Auth::user()->nohp, -3) }}
                                        @else
                                            Nomor Belum Dimasukkan
                                        @endif
                                        )
                                    </p>
                                </div>
                                <p style="margin-bottom: 0px">{{ Auth::user()->address ?: 'Alamat Belum Di Masukan' }}</p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary btn-md " type="button" data-bs-toggle="modal"
                                    data-bs-target="#alamat"
                                    style="background-color: #5F5B00; color: #FFFFFF; font-size: 13px; border-radius: 5px; border-color: #5F5B00">{{ __('Ubah Alamat') }}</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-lainnya" role="tabpanel" aria-labelledby="nav-lainnya-tab">
                            <h1 style="color: #000000; font-size: 25px; font-weight: 400" class="mb-4">Pusat Bantuan
                            </h1>
                            <p style="font-size: 17px">Selamat datang di Pusat Bantuan kami untuk Aplikasi E-commerce! Kami
                                berkomitmen untuk memberikan
                                pengalaman belanja online yang mulus dan menyenangkan bagi semua pengguna kami. Pusat
                                Bantuan
                                ini dirancang untuk membantu Anda memahami dan menggunakan aplikasi e-commerce kami secara
                                efisien.
                            </p>
                            <p style="font-size: 17px">Apa yang dapat Anda temukan di Pusat Bantuan kami:
                            </p>
                            <ul style="font-size: 17px">
                                <li>Panduan Penggunaan: Dapatkan panduan langkah demi langkah tentang cara menggunakan
                                    fitur-fitur utama aplikasi kami. Mulai dari membuat akun, menelusuri produk, hingga
                                    menyelesaikan pembayaran, kami memberikan petunjuk jelas untuk setiap langkahnya.
                                </li>
                                <li>Troubleshooting: Jika Anda mengalami masalah teknis atau menghadapi kesulitan saat
                                    menggunakan aplikasi, temukan solusi cepat dan mudah di bagian troubleshooting kami.
                                    Kami
                                    menyediakan jawaban untuk pertanyaan umum dan solusi untuk masalah umum.
                                </li>
                                <li>FAQ (Pertanyaan yang Sering Diajukan): Jelajahi daftar pertanyaan yang sering diajukan
                                    oleh
                                    pengguna lain dan temukan jawaban yang Anda butuhkan. Kami terus memperbarui FAQ kami
                                    agar
                                    mencakup pertanyaan terbaru dari pengguna kami.
                                </li>
                                <li>Kontak Dukungan Pelanggan: Jika Anda memerlukan bantuan lebih lanjut atau memiliki
                                    pertanyaan khusus, tim dukungan pelanggan kami siap membantu. Temukan informasi kontak
                                    kami
                                    di bagian ini.
                                </li>
                                <li>Pembaruan Aplikasi: Dapatkan informasi terbaru tentang pembaruan aplikasi, peningkatan
                                    fitur, dan perbaikan bug terbaru. Kami selalu berusaha untuk meningkatkan pengalaman
                                    pengguna, dan pembaruan terbaru akan selalu disertakan di Pusat Bantuan kami.
                                </li>
                            </ul>
                            <p style="font-size: 17px">Terima kasih telah memilih aplikasi e-commerce kami. Kami berharap
                                Pusat
                                Bantuan ini dapat membantu Anda menikmati pengalaman belanja online yang lebih baik dan
                                lebih
                                lancar. Jangan ragu untuk mencari bantuan tambahan atau memberikan umpan balik agar kami
                                dapat
                                terus meningkatkan layanan kami.</p>
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
