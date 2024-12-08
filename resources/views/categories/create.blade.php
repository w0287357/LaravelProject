@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a New Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter category name">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Save Category</button>
    </form>
</div>
@endsection
