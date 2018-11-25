@extends('layouts.app')

@section('content')
    @include('partials.banner')
    <div class="container">
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm p-3">
                                <img class="card-img-top img-fluid"
                                     src="{{ Storage::url($product->image) }}"
                                     alt="{{ $product->name }}" style="max-height: 250px;">
                                <div class="card-body">
                                    <h4 class="card-text text-danger">{{ $product->name }}</h4>
                                    <h4 class="p-3 text-primary">
                                        Price: <br>
                                        @if((int)$product->discount_percentage > 0)
                                            <strike>&#8377; {{ $product->price }}</strike>
                                            &#8377; {{ $product->discounted_price }}
                                        @else
                                            <strong>&#8377; {{ $product->price }}</strong>
                                        @endif
                                    </h4>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('item', $product->slug) }}" type="button"
                                       class="btn btn-outline-secondary btn-block">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
