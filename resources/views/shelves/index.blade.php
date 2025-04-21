@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="page-title">Shelves</h1>
    <a href="{{ route('shelves.create') }}" class="btn btn-primary add-btn fade-in-up mb-3">+ Add Shelf</a>

    <table class="table table-striped custom-table fade-in-up">
        <thead>
            <tr>
                <th>#</th>
                <th>Shelf Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shelves as $shelf)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $shelf->shelf_name }}</td>
                <td>
                    <form action="{{ route('shelves.destroy', $shelf->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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

    /* Animasi pada tabel */
    .fade-in-up {
        animation: fadeInUp 0.8s ease-in-out;
    }

    /* Hover efek untuk tombol */
    .add-btn, .delete-btn {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .add-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.5);
    }

    .delete-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(231, 76, 60, 0.5);
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