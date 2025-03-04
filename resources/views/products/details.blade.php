@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Product Details: {{ $product->product_name }}</h2>

    <table class="table table-bordered mt-3">
        <tr>
            <th>Product Code</th>
            <td>{{ $product->product_code }}</td>
        </tr>
        <tr>
            <th>Product Name</th>
            <td>{{ $product->product_name }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $product->category->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Warehouse</th>
            <td>{{ $product->warehouse->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Stock Quantity</th>
            <td>{{ $product->stock->quantity ?? '0' }}</td>
        </tr>
        <tr>
            <th>Purchase Price</th>
            <td>Rp {{ number_format($product->purchase_price, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Sale Price</th>
            <td>Rp {{ number_format($product->sale_price, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Date Added</th>
            <td>{{ $product->created_at->format('d M Y') }}</td>
        </tr>
        <tr>
            <th>Warehouse</th>
            <td>{{ $product->warehouse_name ?? 'N/A' }}</td>
        </tr>        
        @if ($product->image)
    <div class="mb-3 text-center">
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 200px;">
    </div>
@endif
    </table>
</div>
@endsection
