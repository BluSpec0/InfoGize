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
    <div class="container" style="background-color: #fff; border: 1px solid #5F5B00; margin-top: 5rem; border-radius: 5px">
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
                    <a href="{{ '/home' }}" class="btn btn-primary d-flex justify-content-center"
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
                <div class="tab-content" id="nav-tabContent"
                    style="width: 100%; border-right: 1px solid #5F5B00; border-left: 1px solid #5F5B00; border-bottom: 1px solid #5F5B00; padding: 1rem; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">
                    <div class="tab-pane fade show active" id="nav-biodata" role="tabpanel"
                        aria-labelledby="nav-biodata-tab">
                        <div class="mb-5">
                            <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Biodata Diri</h1>
                            <p style="font-size: 17px">{{ Auth::user()->fullname }}</p>
                            <hr style="color: #5F5B00;">
                            <p style="font-size: 17px">{{ Auth::user()->birthday }}</p>
                            <hr style="color: #5F5B00;">
                            <p style="font-size: 17px">{{ Auth::user()->gender }}</p>
                        </div>

                        <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400" class="mb-4">Kontak</h1>
                        <p style="font-size: 17px">{{ Auth::user()->email }}</p>
                        <hr style="color: #5F5B00; width: 100%;">
                        <p style="font-size: 17px">{{ Auth::user()->nohp }}</p>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary btn-md " type="button" data-bs-toggle="modal" data-bs-target="#login"
                                style="background-color: #5F5B00; color: #FFFFFF; font-size: 13px; border-radius: 5px; border-color: #5F5B00">{{ __('Ubah Biodata') }}</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-alamat" role="tabpanel" aria-labelledby="nav-alamat-tab">
                        <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem">
                            <div class="d-flex gap-1" style="font-size: 17px;">
                                <p style="margin-bottom: 0px">{{ Auth::user()->fullname }}</p>
                                <p style="margin-bottom: 0px">(
                                    +62{{ substr(Auth::user()->nohp, 0, 0) }}<span>*****</span>{{ substr(Auth::user()->nohp, -4) }})
                                </p>
                            </div>
                            <p style="margin-bottom: 0px">{{ Auth::user()->address }}</p>
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

        <div class="container">
            <h1>Edit User</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="fullname">fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname"
                        value="{{ $user->fullname }}">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="Laki - laki" {{ $user->gender === 'Laki - laki' ? 'selected' : '' }}>Laki - laki
                        </option>
                        <option value="Perempuan" {{ $user->gender === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="birthday">birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"
                        value="{{ $user->birthday }}">
                </div>

                <div class="form-group">
                    <label for="nohp">nohp</label>
                    <input type="text" class="form-control" id="nohp" name="nohp"
                        value="{{ $user->nohp }}">
                </div>

                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ $user->address }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endsection
