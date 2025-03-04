@extends('layouts.main')

@section('content')
<h1>Add Stock</h1>
<form action="{{ route('stocks.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="product_id" class="form-label">Product</label>
        <select name="product_id" id="product_id" class="form-control" required>
            @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-control" required>
            <option value="in">In</option>
            <option value="out">Out</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Stock</button>
</form>
@endsection
