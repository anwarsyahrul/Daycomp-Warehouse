@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="form-title"><i class="icon-edit me-2"></i>Edit Product</h1>

    <div class="form-container shadow p-4">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="product_code" class="form-label">Product Code</label>
                <input type="text" name="product_code" id="product_code" value="{{ $product->product_code }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Add Supplier Dropdown -->
            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control" required>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="rack_id" class="form-label">Rack</label>
                <select name="rack_id" id="rack_id" class="form-control" required>
                    <option value="" disabled>Select Rack</option>
                    @foreach ($racks as $rack)
                        <option value="{{ $rack->id }}" {{ $product->rack_id == $rack->id ? 'selected' : '' }}>
                            {{ $rack->rack_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="shelf_id" class="form-label">Shelf</label>
                <select name="shelf_id" id="shelf_id" class="form-control" required>
                    <option value="" disabled>Select Shelf</option>
                    @foreach ($shelves as $shelf)
                        <option value="{{ $shelf->id }}" {{ $product->shelf_id == $shelf->id ? 'selected' : '' }}>
                            {{ $shelf->shelf_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="purchase_price" class="form-label">Purchase Price</label>
                <input type="number" name="purchase_price" id="purchase_price" value="{{ $product->purchase_price }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sale_price" class="form-label">Sale Price</label>
                <input type="number" name="sale_price" id="sale_price" value="{{ $product->sale_price }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date_in" class="form-label">Date Product Entered</label>
                <input type="date" name="date_in" id="date_in" value="{{ $product->date_in }}" class="form-control" required>
            </div>

            <button type="submit" class="btn-submit">Update Product</button>
        </form>
    </div>
</div>

<!-- Custom CSS for Styling -->
<style>
    body {
        background: #f8f9fa;
    }

    .form-title {
        font-size: 2rem;
        font-weight: bold;
        color: #34495e;
        text-align: center;
        margin-bottom: 20px;
        animation: fadeInDown 1s ease-in-out;
    }

    .form-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        padding: 25px;
        max-width: 600px;
        margin: 0 auto;
        animation: fadeInUp 1s ease-in-out;
    }

    .form-label {
        font-weight: bold;
        color: #2c3e50;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #007bff, #e74c3c);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.2rem;
        font-weight: bold;
        transition: background 0.3s ease, transform 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #e74c3c, #007bff);
        transform: scale(1.05);
    }

    /* Animations */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
