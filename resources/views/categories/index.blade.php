@extends('layouts.app')

@section('content')
    <h1>Categories</h1>

    <!-- Link to create a new category -->
    <a href="{{ route('categories.create') }}">Create a New Category</a>

    <!-- Display categories in a table -->
    @if($categories->isEmpty())
        <p>No categories available.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <!-- Edit button -->
                            <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection