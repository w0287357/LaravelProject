@extends('layouts.app')

@section('content')
    <h1>Categories</h1>

    <!-- Success message for newly created category -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display a link to create a new category -->
    <a href="{{ route('categories.create') }}">Create a New Category</a>

    <!-- Display categories in a table -->
    @if($categories->isEmpty())
        <p>No categories available.</p>
    @else
        <table border="1" cellspacing="0" cellpadding="10" style="border-collapse: collapse;">
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
                            <!-- Action buttons like Edit and Delete -->
                            <a href="{{ route('categories.edit', $category->id) }}">Edit</a> | 
                            
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border:none; background:none; color:red; cursor:pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
