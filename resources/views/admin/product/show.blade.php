@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products : {{ $product->name }}</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $product->category_id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $product->slug }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <td>{{ $product->discount_percentage }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td>{{ $product->size }}</td>
                            </tr>
                            <tr>
                                <th>Color</th>
                                <td>{{ $product->color }}</td>
                            </tr>
                            <tr>
                                <th>Actions</th>
                                <td>
                                    <a href="{{ route('product.index') }}"
                                       class="btn btn-sm btn-primary">Back</a>
                                    <a href="{{ route('product.edit', $product->name) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Delete?</th>
                                <td>
                                    <form method="post" action="{{ route('product.destroy', $product->id) }}">
                                        {!! csrf_field() !!}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
