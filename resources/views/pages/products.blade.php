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
        <section id="produk" style="margin-top: 5rem">
            <div class="container-sm">
                <div class="mb-3">
                    <h1
                        style="color: #5F5B00; letter-spacing: 0.5px; font-size: 25px; border-bottom: 2px solid #5F5B00; display: inline-block; font-weight: 400">
                        Produk
                    </h1>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 d-flex justify-content-between">
                    @foreach ($products->shuffle()->take(20) as $product)
                        <div class="mb-4">
                            <div class="card"
                                style="max-width: 100vh; max-height: auto; border-color: #5F5B00; border-width: 0.1px; box-shadow: 0px 0px 15px #5f5a0040;">
                                <img src="{{ url('uploads') }}/{{ $product->product_image }}" class="card-img-top"
                                    alt="..."
                                    style="max-width: auto; max-height: 30vh; object-position: center; object-fit: scale-down; background-color: #fff; border-color: transparent">
                                <div class="card-body">
                                    <h5 class="card-title" style="min-height: 50px; font-size: 19px; font-weight: 400">
                                        {{ substr($product->product_name, 0, 45) }}{{ strlen($product->product_name) > 20 ? '...' : '' }}
                                    </h5>
                                    <div class="row d-flex justify-content-between">
                                        <p class="card-text" style="color: #00000090">Rp.
                                            {{ number_format($product->harga, 0, ',', '.') }}</p>

                                    </div>
                                    <div class="d-flex justify-content-end"><a
                                            href="{{ url('product-detail') }}/{{ $product->id }}" class="btn btn-primary"
                                            style="color: #fff; background-color: #5F5B00; border-color: #5F5B00;">
                                            Detail</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection
</body>

</html>
