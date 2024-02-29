@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search Results for "{{ $query }}"</div>

                <div class="card-body">
                    @if ($products->isEmpty())
                        <p>No products found.</p>
                    @else
                        <div class="list-group">
                            @foreach($products as $product)
                                <a href="{{ route('product.show', $product->id) }}" class="list-group-item list-group-item-action">
                                    <h5>{{ $product->product_name }}</h5>
                                    <p>{{ $product->deskripsi }}</p>
                                    <p>Price: {{ $product->harga }}</p>
                                    <p>Stock: {{ $product->stok }}</p>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection