<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Update</title>
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

    <h1>Stock Update</h1>
    <p><strong>Product Name:</strong> {{ $product->product_name }}</p>
    <p><strong>Product Code:</strong> {{ $product->product_code }}</p>
    <p><strong>Stock Update Type:</strong> {{ $type }}</p>
    <p><strong>Quantity:</strong> {{ $quantity }}</p>
    <p><strong>Price:</strong> {{ number_format($price, 2) }}</p>
    <p><strong>Date:</strong> {{ $date }}</p>

</body>
</html>
