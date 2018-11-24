@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Hi {{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
            <p class="lead">Preview products and enter delivery address and payment method</p>
        </div>
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->product->discounted_price }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Total</td>
                                <td>{{ \Illuminate\Support\Facades\Auth::user()->cartItems->count() }}</td>
                                <td>{{ \Illuminate\Support\Facades\Auth::user()->cart_total }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">{{ __('Checkout') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('order.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-form-label text-md-right">{{ __('Delivery Address') }}</label>

                                <div class="col-md-6">
                                    <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus></textarea>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                                <div class="col-md-6">
                                    <select id="payment_method" name="payment_method" class="form-control{{ $errors->has('payment_method') ? ' is-invalid' : '' }}">
                                        <option value="cod">Cash On Delivery</option>
                                    </select>

                                    @if ($errors->has('payment_method'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('payment_method') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Place Order') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
