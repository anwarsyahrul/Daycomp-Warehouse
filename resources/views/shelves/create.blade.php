@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="page-title">Add Shelf</h1>
    <form action="{{ route('shelves.store') }}" method="POST" class="fade-in-up">
        @csrf
        <div class="mb-3">
            <label for="shelf_name" class="form-label">Shelf Name</label>
            <input type="text" name="shelf_name" id="shelf_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary add-btn">Add Shelf</button>
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