@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Category</div>
                    <div class="card-body">
                        <form method="post" action="{{ url('category') }}">

                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <label for="parent_id" class="col-md-4 col-form-label text-md-right">{{ __('Parent category') }}</label>

                                <div class="col-md-6">
                                    <select id="parent_id" class="form-control" name="parent_id">
                                        <option value="null">Select parent category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('parent_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" value="true" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">{{ __('Is Featured') }}</label>
                                    </div>

                                    @if ($errors->has('is_featured'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_featured') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="false" {{ old('is_active') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">{{ __('Is Inactive') }}</label>
                                    </div>

                                    @if ($errors->has('is_active'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_active') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Category') }}
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
