@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="page-title">Suppliers List</h1>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary add-btn mb-3">Add Supplier</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact Info</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->contact_info }}</td>
                <td>{{ $supplier->address }}</td>
                <td>
                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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

    /* Hover efek untuk tombol */
    .add-btn {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .add-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.5);
    }

    /* Hover efek untuk tombol pada tabel */
    .btn-sm {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-sm:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.5);
    }

    /* Keyframes untuk animasi */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
