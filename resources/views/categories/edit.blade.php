@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('category.update', $category) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" value="{{ old('name', $category->name) }}"
                    class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@stop
