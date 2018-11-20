@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Showing category : {{ $category->name }}</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <th>Parent</th>
                                <td>{{ $category->parent_id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $category->slug }}</td>
                            </tr>
                            <tr>
                                <th>Is Featured</th>
                                <td>
                                    <span class="badge {{ $category->is_featured ? 'badge-success' : 'badge-danger' }}">{{ $category->is_featured ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Is Active</th>
                                <td>
                                    <span class="badge {{ $category->is_active ? 'badge-success' : 'badge-danger' }}">{{ $category->is_active ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Actions</th>
                                <td>
                                    <a href="{{ route('category.index') }}"
                                       class="btn btn-sm btn-primary">Back</a>
                                    <a href="{{ route('category.edit', $category->id) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Delete?</th>
                                <td>
                                    <form method="post" action="{{ route('category.destroy', $category->id) }}">
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
