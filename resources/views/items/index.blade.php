@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Items</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Add New Item</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SKU</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->sku }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No items found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
