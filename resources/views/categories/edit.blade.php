@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PATCH') <!-- Use PATCH method for updating -->
        
        <label for="name">Category Name: </label>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Enter Category Name">
        
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        
        <button type="submit">Update Category</button>
    </form>

@endsection