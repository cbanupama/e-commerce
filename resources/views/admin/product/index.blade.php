@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products
                        <a class="pull-right btn btn-primary" href="{{ route('product.create') }}">Add New Product</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount_percentage }}</td>
                                    <td>
                                        <img src="{{ Storage::url($product->image) }}" class="img-fluid" style="max-height: 50px;" alt="{{ $product->name }}"/>
                                    </td>
                                    <td>{{ $product->size }}</td>
                                    <td>{{ $product->color }}</td>
                                    <td>
                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary">Show</a>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
