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
                                <img class="card-img-top"
                                     src="{{ Storage::url($product->image) }}"
                                     alt="{{ $product->name }}" style="max-height: 150px;">
                                <div class="card-body">
                                    <h4 class="card-text">{{ $product->name }}</h4>
                                    <h6>&#8377; {{ $product->price }}</h6>
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
