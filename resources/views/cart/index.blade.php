@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Shopping Cart @if(\Illuminate\Support\Facades\Auth::user()->cartItems->count())<a class="pull-right btn btn-primary" href="{{ route('checkout') }}">Checkout</a>@endif</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Notes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->product->image) }}" class="img-fluid"
                                             style="max-height: 25px;" alt="{{ $item->product->name }}"/>
                                    </td>
                                    <td>{{ $item->product->discounted_price }}</td>
                                    <td>
                                        <form method="post" action="{{ route('cart.update', $item->id) }}"
                                              class="form-inline">
                                            @csrf
                                            @method('put')
                                            <div class="form-group mb-2">
                                                <select class="form-control float-left" name="quantity">
                                                    @foreach(range(0, 10) as $index)
                                                        <option value="{{ $index }}" {{ $index === $item->quantity ? 'selected': '' }}>{{ $index }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="ml-2 btn btn-warning mb-2">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        To delete just choose quantity as zero
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <strong>Total : {{ \Illuminate\Support\Facades\Auth::user()->cart_total }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
