<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Product Details</h1>
    <p><strong>Product Name:</strong> {{ $product->product_name }}</p>
    <p><strong>Product Code:</strong> {{ $product->product_code }}</p>
    <p><strong>Category:</strong> {{ $category }}</p>
    <p><strong>Supplier:</strong> {{ $supplier }}</p>
    <p><strong>Warehouse:</strong> {{ $warehouse }}</p>
    <p><strong>Purchase Price:</strong> {{ number_format($product->purchase_price, 2) }}</p>
    <p><strong>Sale Price:</strong> {{ number_format($product->sale_price, 2) }}</p>
    <p><strong>Stock Quantity:</strong> {{ $product->stock }}</p>

</body>
</html>
