@extends('layouts.main')

@section('content')
<div class="container mt-5 qr-container">
    <h2 class="qr-title">QR Code for <span>{{ $product->product_name }}</span></h2>
    <div class="qr-box mt-4 text-center">
        {!! $qrCode !!}
    </div>
</div>

<style>
    body {
        background: #f4f6f9;
    }

    .qr-container {
        max-width: 400px;
        margin: 0 auto;
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
        animation: fadeIn 1s ease-in-out;
    }

    .qr-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #34495e;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
    }

    .qr-title span {
        color: #e74c3c;
    }

    .qr-box {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
