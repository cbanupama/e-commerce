@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Categories
                        <a class="pull-right btn btn-primary" href="{{ route('category.create') }}">Add New Category</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Parent</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Is Featured</th>
                                    <th>Is Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->parent ? $category->parent->name : '' }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <span class="badge {{ $category->is_featured ? 'badge-success' : 'badge-danger' }}">{{ $category->is_featured ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $category->is_active ? 'badge-success' : 'badge-danger' }}">{{ $category->is_active ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-sm btn-primary">Show</a>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
