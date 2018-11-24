@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{ $product->name }}</h1>
        </div>
    </section>
    <div class="container">
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div id="singleProductView" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($product->images as $image)
                                    <li data-target="#singleProductView" data-slide-to="0" class="active"></li>
                                    <li data-target="#singleProductView" data-slide-to="1"></li>
                                    <li data-target="#singleProductView" data-slide-to="2"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="img-fluid d-block w-100" src="{{ Storage::url($product->image) }}"
                                         alt="{{ $product->name }}">
                                </div>
                                @foreach($product->images as $image)
                                    <div class="carousel-item">
                                        <img class="img-fluid d-block w-100" src="{{ Storage::url($image->path) }}"
                                             alt="{{ $product->name }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#singleProductView" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#singleProductView" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card mb-4 shadow-sm p-3">
                            <div class="card-body">
                                <h1 class="card-text text-center p-1">{{ $product->name }}</h1>
                                <h4 class="p-2"><strong>Discount: </strong>{{ $product->discount_percentage }}%</h4>
                                <h4 class="p-2"><strong>Size: </strong>{{ $product->size }}</h4>
                                <h4 class="p-2"><strong>Color: </strong>{{ $product->color }}</h4>
                                <h1 class="p-3">
                                    Price: <br>
                                    <strike>&#8377; {{ $product->price }}</strike>
                                    &#8377; {{ $product->discounted_price }}
                                </h1>
                            </div>
                            <div class="card-footer">
                                <form method="post" action="{{ route('cart.store') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-lg btn-outline-secondary btn-block">Add To Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
