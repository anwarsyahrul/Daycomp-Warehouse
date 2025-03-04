@extends('layouts.main')

@section('content')
<h1>Edit Stock</h1>
<form action="{{ route('stocks.update', $stock->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="product_id" class="form-label">Product</label>
        <select name="product_id" id="product_id" class="form-control" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ $stock->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->product_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="quantity" value="{{ $stock->quantity }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Stock</button>
</form>
@endsection
