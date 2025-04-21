@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="page-title">Add Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="POST" class="fade-in-up">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Supplier Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="contact_info" class="form-label">Contact Info</label>
            <input type="text" name="contact_info" id="contact_info" class="form-control">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary add-btn">Add Supplier</button>
    </form>
</div>

<style>
    /* Animasi untuk judul */
    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #34495e;
        margin-bottom: 20px;
        text-align: center;
        animation: fadeInDown 1s ease-in-out;
    }

    /* Animasi pada form */
    .fade-in-up {
        animation: fadeInUp 0.8s ease-in-out;
    }

    /* Hover efek untuk tombol */
    .add-btn {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .add-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.5);
    }

    /* Keyframes untuk animasi */
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
