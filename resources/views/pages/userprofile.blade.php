@extends('layouts.user.profile')

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
    <div class="container" style="background-color: #fff; border: 1px solid #5F5B00; margin-top: 3rem; border-radius: 5px">
        <div class="d-flex mb-3">
            <a href="{{ '/home' }}" class="" style="margin-top: 1rem">
                <img src="{{ url('/images/backarrow.svg') }}" alt="" width="30"></a>
        </div>

        <div class="d-flex flex-row gap-3">
            <div style="display: inline-block;">
                <div style="display: inline-block; border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem"
                    class="mb-4">
                    <div class="mb-4">
                        @if (Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" alt="avatar"
                                style="border: 1px solid #5F5B00; border-radius: 5px; width: 50vh; height: 50vh; object-fit: cover; object-position: center">
                        @else
                            <img src="{{ url('/images/defaultavatar.png') }}" alt="default-avatar"
                                style="border: 1px solid #5F5B00; border-radius: 5px; max-width: 50vh; max-height: 50vh; object-fit: cover; object-position: center">
                        @endif
                    </div>

                    <form id="avatarForm" action="{{ route('profile.update', $user) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label for="avatar" class="btn btn-primary d-flex justify-content-center"
                            style="color: #5F5B00; background-color: #fff; border-color: #5F5B00">
                            Ubah Gambar
                            <input type="file" id="avatar" name="avatar" style="display: none;"
                                onchange="submitForm()">
                        </label>
                    </form>

                    <script>
                        function submitForm() {
                            document.getElementById('avatarForm').submit();
                        }
                    </script>
                </div>

                <div class=" mb-3">
                    <a class="btn btn-primary d-flex justify-content-center" data-bs-toggle="modal"
                        data-bs-target="#password" type="button"
                        style="color: #5F5B00; background-color: #fff; border-color: #5F5B00">
                        Ubah Kata Sandi</a>
                </div>

                <div class=" mb-3">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        class="btn btn-primary d-flex justify-content-center"
                        style="color: #fff; background-color: #5F5B00; border-color: #5F5B00">
                        logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            <div style="width: 100%">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-biodata-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-biodata" type="button" role="tab" aria-controls="nav-biodata"
                            aria-selected="true">Biodata
                            Diri</button>
                        <button class="nav-link" id="nav-alamat-tab" data-bs-toggle="tab" data-bs-target="#nav-alamat"
                            type="button" role="tab" aria-controls="nav-alamat" aria-selected="false">Alamat</button>
                        <button class="nav-link" id="nav-lainnya-tab" data-bs-toggle="tab" data-bs-target="#nav-lainnya"
                            type="button" role="tab" aria-controls="nav-lainnya" aria-selected="false">Lainnya</button>
                    </div>
                </nav>
                <div class="tab-content mb-3" id="nav-tabContent"
                    style="width: 100%; border-right: 1px solid #5F5B00; border-left: 1px solid #5F5B00; border-bottom: 1px solid #5F5B00; padding: 1rem; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">
                    <div class="tab-pane fade show active" id="nav-biodata" role="tabpanel"
                        aria-labelledby="nav-biodata-tab">
                        <div class="mb-5">
                            <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Biodata Diri</h1>
                            <p style="font-size: 17px">{{ Auth::user()->fullname ?: 'Masukan Nama Lengkap' }}</p>
                            <hr style="color: #5F5B00;">
                            <p style="font-size: 17px">{{ Auth::user()->birthday ?: 'Masukan Tanggal Lahir' }}</p>
                            <hr style="color: #5F5B00;">
                            <p style="font-size: 17px">{{ Auth::user()->gender ?: 'Pilih Gender' }}</p>
                        </div>


                        <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Kontak</h1>
                        <p style="font-size: 17px">{{ Auth::user()->email ?: 'Masukan Email' }}</p>
                        <hr style="color: #5F5B00; width: 100%;">
                        <p style="font-size: 17px">{{ Auth::user()->nohp ?: 'Masukan No.Ponsel' }}</p>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary btn-md " type="button" data-bs-toggle="modal"
                                data-bs-target="#biodata"
                                style="background-color: #5F5B00; color: #FFFFFF; font-size: 13px; border-radius: 5px; border-color: #5F5B00">{{ __('Ubah Biodata') }}</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-alamat" role="tabpanel" aria-labelledby="nav-alamat-tab">
                        <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem" class="mb-4">
                            <div class="d-flex gap-1" style="font-size: 17px;">
                                <p style="margin-bottom: 0px">{{ Auth::user()->fullname ?: 'Nama Belum Di Masukan' }}</p>
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
                        <h1 style="color: #000000; font-size: 25px; font-weight: 400" class="mb-4">Pusat Bantuan</h1>
                        <p style="font-size: 17px">Selamat datang di Pusat Bantuan kami untuk Aplikasi E-commerce! Kami
                            berkomitmen untuk memberikan
                            pengalaman belanja online yang mulus dan menyenangkan bagi semua pengguna kami. Pusat Bantuan
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
                                menggunakan aplikasi, temukan solusi cepat dan mudah di bagian troubleshooting kami. Kami
                                menyediakan jawaban untuk pertanyaan umum dan solusi untuk masalah umum.
                            </li>
                            <li>FAQ (Pertanyaan yang Sering Diajukan): Jelajahi daftar pertanyaan yang sering diajukan oleh
                                pengguna lain dan temukan jawaban yang Anda butuhkan. Kami terus memperbarui FAQ kami agar
                                mencakup pertanyaan terbaru dari pengguna kami.
                            </li>
                            <li>Kontak Dukungan Pelanggan: Jika Anda memerlukan bantuan lebih lanjut atau memiliki
                                pertanyaan khusus, tim dukungan pelanggan kami siap membantu. Temukan informasi kontak kami
                                di bagian ini.
                            </li>
                            <li>Pembaruan Aplikasi: Dapatkan informasi terbaru tentang pembaruan aplikasi, peningkatan
                                fitur, dan perbaikan bug terbaru. Kami selalu berusaha untuk meningkatkan pengalaman
                                pengguna, dan pembaruan terbaru akan selalu disertakan di Pusat Bantuan kami.
                            </li>
                        </ul>
                        <p style="font-size: 17px">Terima kasih telah memilih aplikasi e-commerce kami. Kami berharap Pusat
                            Bantuan ini dapat membantu Anda menikmati pengalaman belanja online yang lebih baik dan lebih
                            lancar. Jangan ragu untuk mencari bantuan tambahan atau memberikan umpan balik agar kami dapat
                            terus meningkatkan layanan kami.</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <section id="Bio">
        <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal fade" id="biodata" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="biodata" aria-hidden="true">
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
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="row mb-1"
                                        style="color: #5F5B00; font-size: 20px; font-weight: 400; margin-left: 1px">
                                        {{ __('Biodata') }}</div>
                                    <div class=" mb-3 justify-content-center">
                                        <div class="form-group">
                                            <input id="fullname" type="text"
                                                style="box-shadow: 0px 0px 2px #5F5B00;" placeholder="Masukan Nama"
                                                class="form-control" name="fullname" value="{{ $user->fullname }}"
                                                autofocus>

                                            <style>
                                                #fullname::placeholder {
                                                    color: #5F5B00;
                                                    text-align: center;
                                                    opacity: 0.3;
                                                }
                                            </style>
                                        </div>
                                    </div>

                                    <div class="mb-3 justify-content-center">
                                        <div class="form-group">
                                            <input id="birthday" type="date"
                                                style="box-shadow: 0px 0px 2px #5F5B00;"
                                                placeholder="Masukan Tanggal Lahir" class="form-control"
                                                name="birthday" value="{{ $user->birthday }}" autofocus>

                                            <style>
                                                #birthday::placeholder {
                                                    color: #5F5B00;
                                                    text-align: center;
                                                    opacity: 0.3;
                                                }

                                                #birthday::first-line {
                                                    color: #5F5B00;
                                                }
                                            </style>
                                        </div>
                                    </div>

                                    <div class="mb-3 justify-content-center">
                                        <div class="form-group">
                                            <select class="form-control" id="gender" name="gender"
                                                style="box-shadow: 0px 0px 2px #5F5B00;" placeholder="Masukan Gender">
                                                <option value="Laki - laki"
                                                    {{ $user->gender === 'Laki - laki' ? 'selected' : '' }}>Laki -
                                                    laki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ $user->gender === 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>

                                            <style>
                                                #gender::placeholder {
                                                    color: #5F5B00;
                                                    text-align: center;
                                                    opacity: 0.3;
                                                }

                                                #gender::first-line {
                                                    color: #5F5B00;
                                                }
                                            </style>
                                        </div>
                                    </div>

                                    <div class="row mb-1 mt-3"
                                        style="color: #5F5B00; font-size: 20px; font-weight: 400; margin-left: 1px">
                                        {{ __('Kontak') }}</div>
                                    <div class="mb-3 justify-content-center">
                                        <div class="form-group">
                                            <input id="nohp" type="number"
                                                style="box-shadow: 0px 0px 2px #5F5B00;"
                                                placeholder="Masukan Nomer Handphone" class="form-control"
                                                name="nohp" value="{{ $user->nohp }}" autofocus>

                                            <style>
                                                #nohp::placeholder {
                                                    color: #5F5B00;
                                                    text-align: center;
                                                    opacity: 0.3;
                                                }

                                                #nohp::first-line {
                                                    color: #5F5B00;
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

    <section id="Address">
        <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal fade" id="alamat" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="alamat" aria-hidden="true">
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
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="row mb-1"
                                        style="color: #5F5B00; font-size: 20px; font-weight: 400; margin-left: 1px">
                                        {{ __('Alamat') }}</div>
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

    <section id="forget">
        <div class="modal fade" id="password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="password" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div style="padding: 3rem">
                        <div class="">
                            <div class="" style="">
                                <a class="" style="color: #5F5B00;" data-bs-dismiss="modal"><img
                                        src="{{ url('/images/backarrow.svg') }}" alt="" width="30"></a>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-1"
                            style="color: #5F5B00; font-size: 30px; font-weight: 400;">
                            {{ __('Atur Ulang Sandi') }}</div>
                        <div class="row justify-content-center mb-4">
                            <div
                                style="color: #5F5B00; font-size: 15px; font-weight: 400; opacity: 0.5; max-width: 50%; text-align: center">
                                {{ __('Silahkan Masukan Email Akun Anda Untuk Melanjutkan.') }}
                            </div>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3 justify-content-center">

                                    <div class="col-md-6">
                                        <input id="email" type="email" style="box-shadow: 0px 0px 2px #5F5B00;"
                                            placeholder="Masukan E-mail"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        <style>
                                            #email::placeholder {
                                                color: #5F5B00;
                                                text-align: center;
                                                opacity: 0.3;
                                            }

                                            #email::first-line {
                                                color: #5F5B00;
                                            }
                                        </style>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primar"
                                            style="background-color: #5F5B00; color: #FFFFFF; font-size: 15px; border-radius: 5px">
                                            {{ __('Kirim email reset password') }}
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
