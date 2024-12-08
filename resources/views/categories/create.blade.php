<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>
    <h1>Create a New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Category Name: </label>
        <input type="text" id="name" name="name" placeholder="Enter Category Name" value="{{ old('name') }}">
        
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        
        <button type="submit">Add Category</button>
    </form>

</body>
</html>