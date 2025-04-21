<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Produk dan Stok</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        /* Header (Kop Surat) Style */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header .company-name {
            font-size: 32px;
            color: #2c3e50;
            margin: 0;
            font-weight: bold;
        }
        .header .tagline {
            font-size: 16px;
            color: #7f8c8d;
            margin: 0;
        }
        .header .contact-info {
            font-size: 12px;
            color: #7f8c8d;
            margin-top: 5px;
        }
        .header .logo {
            width: 100px; /* Set your logo size */
            margin-bottom: 10px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #2c3e50;
            color: #fff;
            font-weight: bold;
        }
        td {
            background-color: #f9f9f9;
        }

        .highlight {
            font-weight: bold;
        }

        .section-title {
            font-size: 18px;
            color: #2c3e50;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .divider {
            border-top: 2px solid #2c3e50;
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <!-- Header (Kop Surat) -->
    <div class="header">
        <h1 class="company-name">Daycomp </h1>
        <p class="tagline">Sistem Manajemen Produk dan Stok</p>
        <p class="contact-info">
            Jalan Teknologi No. 10, Jakarta, Indonesia | Telp: +62 21 1234 5678 | Email: info@daycomp.com
        </p>
    </div>

    <!-- Product Information Section -->
    <div>
        <h2 class="section-title">Informasi Produk</h2>
        <table>
            <tr>
                <th>Nama Produk</th>
                <td>{{ $product->product_name }}</td>
            </tr>
            <tr>
                <th>Kode Produk</th>
                <td>{{ $product->product_code }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $category }}</td>
            </tr>
            <tr>
                <th>Pemasok</th>
                <td>{{ $supplier }}</td>
            </tr>
            <tr>
                <th>Gudang</th>
                <td>{{ $warehouse }}</td>
            </tr>
            <tr>
                <th>Harga Pembelian</th>
                <td>Rp {{ number_format($product->purchase_price, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Harga Jual</th>
                <td>Rp {{ number_format($product->sale_price, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Tanggal Dibuat</th>
                <td>{{ $created_at }}</td>
            </tr>
        </table>
    </div>

    <div class="divider"></div>

    <!-- Stock Information Section -->
    <div>
        <h2 class="section-title">Informasi Stok</h2>
        <table>
            <tr>
                <th>ID Stok</th>
                <td>{{ $stock->id }}</td>
            </tr>
            <tr>
                <th>Jenis Pembaruan Stok</th>
                <td>{{ $stock_type }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $quantity }}</td>
            </tr>
            <tr>
                <th>Tanggal Pembaruan Stok</th>
                <td>{{ $stock_date }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Daycomp Corp - Sistem Informasi &copy; {{ date('Y') }}</p>
    </div>

</body>
</html>
