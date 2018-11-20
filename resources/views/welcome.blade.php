@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Welcome to {{ config('app.name') }}</h1>
            <p class="lead text-muted">Browse through our products to find exiting offers.</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Today's deals</a>
                <a href="#" class="btn btn-secondary my-2">Best mobiles phones</a>
            </p>
        </div>
    </section>
    <div class="container">
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm p-3">
                                <img class="card-img-top"
                                     src="{{ Storage::url($product->image) }}"
                                     alt="{{ $product->name }}" style="max-height: 250px;">
                                <div class="card-body">
                                    <h4 class="card-text">{{ $product->name }}</h4>
                                    <h6>
                                        <strike>&#8377; {{ $product->price }}</strike>
                                        &#8377; {{ $product->price - ($product->price / ($product->discount_percentage <= 0 ? 1 : $product->discount_percentage)) }}
                                    </h6>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('item', $product->slug) }}" type="button" class="btn btn-outline-secondary btn-block">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
