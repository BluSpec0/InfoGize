@extends('layouts.user.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    @section('content')
        <section id="informasi" style="margin-top: 5rem">
            <div class="container-sm">
                <div class="mb-3">
                    <h1
                        style="color: #5F5B00; letter-spacing: 0.5px; font-size: 25px; border-bottom: 2px solid #5F5B00; display: inline-block; font-weight: 400">
                        Informasi
                    </h1>
                </div>
                <div class="d-flex flex-column">
                    @foreach ($products->shuffle()->take(20) as $product)
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

                                <img src="{{ url('uploads') }}/{{ $product->product_image }}"
                                    class="card-img-right flex-auto d-none d-md-block"
                                    style="padding-right: 20px; max-width: 40vh; max-height: auto; object-position: center; object-fit: scale-down; background-color: #fff; border-color: transparent">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection
</body>

</html>
