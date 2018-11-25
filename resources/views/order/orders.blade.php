@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Hi {{ \Illuminate\Support\Facades\Auth::user()->name }}, Here are the list of your oders</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Order Total</th>
                                <th>Delivery Address</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->number }}</td>
                                    <td>{{ $order->amount }}</td>
                                    <td>{{ $order->delivery_address }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>
                                        <form method="post" action="{{ route('order.update', $order->id) }}" class="form-inline">
                                            @csrf
                                            @method('put')
                                            <div class="form-group mb-2">
                                                <select class="form-control float-left" name="payment_status">
                                                    <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="ml-2 btn btn-warning mb-2">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
