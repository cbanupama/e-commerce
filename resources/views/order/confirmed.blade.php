@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">
                Hi {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </h1>
            <h1 class="text-success">
                Your oder has been confirmed.
            </h1>
            <h1 class="jumbotron-heading">
                Order ID: {{ $order->number }}
            </h1>
        </div>
    </section>
@endsection
