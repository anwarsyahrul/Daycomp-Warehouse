@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="form-title"><i class="icon-plus me-2"></i>Add Product</h1>

    <div class="form-container shadow p-4">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="product_code" class="form-label">Product Code</label>
                <input type="text" name="product_code" id="product_code" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="warehouse_id" class="form-label">Warehouse</label>
                <select name="warehouse_id" id="warehouse_id" class="form-control" required>
                    <option value="" disabled selected>Select a warehouse</option>
                    @php
                        $warehouses = \App\Models\Warehouse::all();
                    @endphp
                    @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3" id="warehouse-details" style="display: none;">
                <label class="form-label">Warehouse Name:</label>
                <p class="warehouse-info"><strong><span id="warehouse-name"></span></strong></p>
            </div>

            <div class="mb-3">
                <label for="purchase_price" class="form-label">Purchase Price</label>
                <input type="number" name="purchase_price" id="purchase_price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sale_price" class="form-label">Sale Price</label>
                <input type="number" name="sale_price" id="sale_price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_date" class="form-label">Date Product Entered</label>
                <input type="date" name="product_date" id="product_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="rack_id" class="form-label">Rack</label>
                <select name="rack_id" class="form-control">
                    <option value="">Select Rack</option>
                    @foreach ($racks as $rack)
                        <option value="{{ $rack->id }}">{{ $rack->rack_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="shelf_id" class="form-label">Shelf</label>
                <select name="shelf_id" class="form-control">
                    <option value="">Select Shelf</option>
                    @foreach ($shelves as $shelf)
                        <option value="{{ $shelf->id }}">{{ $shelf->shelf_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">Add Product</button>
        </form>
    </div>
</div>

<!-- AJAX to Fetch Warehouse Name -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#warehouse_id').change(function () {
        const warehouseId = $(this).val();
        
        if (warehouseId) {
            $.ajax({
                url: `/warehouses/${warehouseId}`,
                method: 'GET',
                success: function (data) {
                    $('#warehouse-name').text(data.warehouse_name);
                    $('#warehouse-details').fadeIn();
                },
                error: function () {
                    $('#warehouse-details').hide();
                    alert('Failed to fetch warehouse details.');
                }
            });
        } else {
            $('#warehouse-details').hide();
        }
    });
</script>

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

    .warehouse-info {
        background: #ecf0f1;
        padding: 10px;
        border-radius: 8px;
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
