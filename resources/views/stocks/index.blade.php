@extends('layouts.main')

@section('content')
<h1>Stock</h1>
<a href="{{ route('stocks.create') }}" class="btn btn-primary mb-3">Add Stock</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
        <tr>
            <td>{{ $stock->product->product_name }}</td>
            <td>{{ $stock->quantity }}</td>
            <td>{{ $stock->type }}</td>
            <td>
                <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
