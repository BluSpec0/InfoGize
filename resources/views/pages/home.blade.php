@extends('layouts.user.app')

@section('content')
    <section id="home" style="margin-bottom: 5rem">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel" draggable="true">
            <div class="carousel-indicators" style="flex-direction: row; gap: 10px; padding-bottom: 15px;">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"
                    style="width: 10px; height: 10px; border-radius: 100%;"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"
                    style="width: 10px; height: 10px; border-radius: 100%"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"
                    style="width: 10px; height: 10px; border-radius: 100%"></button>
            </div>
            <div class="carousel-inner" draggable="true">
                <div class="carousel-item active" data-interval="3000" data-ride="true">
                    <img src="/images/image-1.png" class="d-block w-100" alt="..."
                        style="height: 100vh; object-fit: cover; filter: brightness(0.65);">
                    <div class="carousel-caption d-none d-md-block mb-4">
                        <h5 class="display-4" style="font-weight: 400">Terjamin</h5>
                        <p class=""
                            style="font-size: 20px; font-weight: 300; word-spacing: 1.5px; letter-spacing: 1px">
                            Informasi,
                            dan
                            Transaksi Terjamin
                        </p>
                    </div>
                </div>
                <div class="carousel-item" data-interval="3000" data-ride="true">
                    <img src="/images/image-2.jpg" class="d-block w-100" alt="..."
                        style="height: 100vh; object-fit: cover; filter: brightness(0.6)">
                    <div class="carousel-caption d-none d-md-block mb-4">
                        <h5 class="display-4" style="font-weight: 400">Terjamin</h5>
                        <p class=""
                            style="font-size: 20px; font-weight: 300; word-spacing: 1.5px; letter-spacing: 1px">
                            Informasi,
                            dan
                            Transaksi Terjamin
                        </p>
                    </div>
                </div>
                <div class="carousel-item" data-interval="3000" data-ride="true">
                    <img src="/images/image-3.jpg" class="d-block w-100" alt="..."
                        style="height: 100vh; object-fit: cover; filter: brightness(0.65)">
                    <div class="carousel-caption d-none d-md-block mb-4">
                        <h5 class="display-4" style="font-weight: 400">Terjamin</h5>
                        <p class=""
                            style="font-size: 20px; font-weight: 300; word-spacing: 1.5px; letter-spacing: 1px">
                            Informasi,
                            dan
                            Transaksi Terjamin
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="informasi">
        <div class="container-sm">
            <div class="mb-3">
                <h1
                    style="color: #5F5B00; letter-spacing: 0.5px; font-size: 25px; border-bottom: 2px solid #5F5B00; display: inline-block; font-weight: 400">
                    Informasi
                </h1>
            </div>
            <div class="d-flex flex-column">
                @foreach ($products->shuffle()->take(2) as $product)
                    <div class="mb-4">
                        <div class="card flex-md-row w-100"
                            style="border-color: #5F5B00; border-width: 0.5px; box-shadow: 0px 0px 15px #5f5a0040; padding-top: 5px">
                            <div class="card-body d-flex align-content-around row-cols-1 row">
                                <h5 class="card-title mb-4" style="font-size: 20px; font-weight: 400">
                                    {{ $product->product_name }}</h5>
                                <div class="mb-4" style="flex-direction: column; gap: 1px;color: #00000050 ">
                                    <p style="margin-bottom: 0px">Nama Resmi Produk: {{ $product->nama }}</p>
                                    <p style="margin-bottom: 0px">Kode Part: {{ $product->kodepart }}</p>
                                    <p style="margin-bottom: 5px">Kategori: {{ $product->kategori }}</p>
                                </div>
                                <div>
                                    <a href="{{ url('information-detail') }}/{{ $product->id }}" class="btn btn-primary "
                                        style="color: #fff; background-color: #5F5B00; border-color: #5F5B00">
                                        Detail</a>
                                </div>
                            </div>

                            <img src="{{ $product->product_image }}" class="card-img-right flex-auto d-none d-md-block"
                                style="padding-right: 20px; max-width: 40vh; max-height: auto; object-position: center; object-fit: scale-down; background-color: #fff; border-color: transparent">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn row d-flex align-items-center" href="{{ '/informations' }}"
                    style="color: #5F5B00; font-size: 15px;">
                    {{ __('View All') }}<img src="{{ url('/images/arrow.svg') }}" alt=""
                        style="width: 25px; padding-right: 0px; padding-left: 3px" class="d-flex align-items-center">
                </a>
            </div>
        </div>
    </section>

    <section id="produk">
        <div class="container-sm">
            <div class="mb-3">
                <h1
                    style="color: #5F5B00; letter-spacing: 0.5px; font-size: 25px; border-bottom: 2px solid #5F5B00; display: inline-block; font-weight: 400">
                    Produk
                </h1>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 d-flex">
                @foreach ($products->shuffle()->take(4) as $product)
                    <div class="mb-4">
                        <div class="card"
                            style="max-width: 100vh; max-height: auto; border-color: #5F5B00; border-width: 0.1px; box-shadow: 0px 0px 15px #5f5a0040;">
                            <img src="{{ $product->product_image }}" class="card-img-top" alt="..."
                                style="max-width: auto; max-height: 30vh; object-position: center; object-fit: scale-down; background-color: #fff; border-color: transparent">
                            <div class="card-body">
                                <h5 class="card-title" style="min-height: 50px; font-size: 19px; font-weight: 400">
                                    {{ substr($product->product_name, 0, 45) }}{{ strlen($product->product_name) > 20 ? '...' : '' }}
                                </h5>
                                <div class="row d-flex justify-content-between">
                                    <p class="card-text" style="color: #00000090">Rp.
                                        {{ number_format($product->harga, 0, ',', '.') }}</p>

                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="color: #00000090">{{ $product->lokasiparts }}</p>
                                    <a href="{{ url('product-detail') }}/{{ $product->id }}"
                                        class="btn btn-primary align-items-center"
                                        style="color: #fff; background-color: #5F5B00; border-color: #5F5B00;">
                                        Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn row d-flex align-items-center" href="{{ '/products' }}"
                    style="color: #5F5B00; font-size: 15px;">
                    {{ __('View All') }}<img src="{{ url('/images/arrow.svg') }}" alt=""
                        style="width: 25px; padding-right: 0px; padding-left: 3px" class="d-flex align-items-center">
                </a>
            </div>
        </div>
    </section>

    <section id="FAQ">
        <div class="container" style="padding-top: 5rem">
            <div class="mb-3">
                <h1
                    style="color: #5F5B00; letter-spacing: 0.5px; font-size: 25px; border-bottom: 2px solid #5F5B00; display: inline-block; font-weight: 400">
                    FAQ
                </h1>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-controls="flush-collapseOne"
                            style="color: #5F5B00;">
                            Apa yang membedakan aplikasi ini dari toko suku cadang sepeda motor lainnya?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="color: #5F5B00;">
                            <li>Aplikasi kami menyediakan pengalaman belanja yang mudah, aman, dan cepat.</li>
                            <li>Stok suku cadang terupdate secara real-time untuk memastikan ketersediaan barang.</li>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"
                            style="color: #5F5B00;">
                            Bagaimana cara melakukan pemesanan suku cadang?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="color: #5F5B00;">
                            <li>Pilih suku cadang yang diinginkan dari katalog kami.</li>
                            <li>Tambahkan ke keranjang belanja dan lanjutkan ke proses pembayaran.</li>
                            <li>Ikuti langkah-langkah sederhana untuk menyelesaikan pesanan.</li>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree" style="color: #5F5B00;">
                            Apakah ada jaminan kualitas untuk suku cadang yang dibeli?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="color: #5F5B00;">
                            <li>Ya, kami hanya menyediakan suku cadang berkualitas tinggi dan memiliki kebijakan
                                pengembalian barang jika terdapat masalah.</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="hubungikami">
        <div class="container" style="padding-top: 5rem">
            <div class="card" style="border-color: #5F5B00; border-width: 0.5%; box-shadow: 0px 0px 15px #5f5a0040;">
                <h5 class="card-header d-flex justify-content-center align-items-center"
                    style="border-color: #5F5B00; border-width: 1px; background-color: #fff; color: #5F5B00; font-weight: 400; font-size: 25px; height: 4rem">
                    Hubungi Kami
                </h5>
                <div class="card-body">
                    <form id="contactForm">

                        <!-- Name input -->
                        <div class="mb-3">
                            <label class="form-label" for="name" style="color: #5F5B00">Nama</label>
                            <input class="form-control" id="name" type="text"
                                style="box-shadow: 0px 0px 5px #5f5a0040;" />
                        </div>

                        <!-- Email address input -->
                        <div class="mb-3">
                            <label class="form-label" for="emailAddress" style="color: #5F5B00">Email</label>
                            <input class="form-control" id="emailAddress" type="email"
                                style="box-shadow: 0px 0px 5px #5f5a0040;" />
                        </div>

                        <!-- Message input -->
                        <div class="mb-3">
                            <label class="form-label" for="message" style="color: #5F5B00">Pesan</label>
                            <textarea class="form-control" id="message" type="text"
                                style="height: 10rem; box-shadow: 0px 0px 5px #5f5a0040;"></textarea>
                        </div>

                        <!-- Form submit button -->
                        <div class="d-flex justify-content-end">
                            <div>
                                <button class="btn btn-primary btn-md" type="submit"
                                    style="color: #fff; background-color: #5F5B00; border-color: #5F5B00">Kirim</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
