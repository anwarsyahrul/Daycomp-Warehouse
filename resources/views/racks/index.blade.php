@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="page-title">Racks</h2>
    <a href="{{ route('racks.create') }}" class="btn btn-primary mb-3">+ Add Rack</a>

    <table class="table table-striped custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Rack Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($racks as $rack)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $rack->rack_name }}</td>
                <td>
                    <form action="{{ route('racks.destroy', $rack->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style>
    .page-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .custom-table th, .custom-table td {
        text-align: center;
        vertical-align: middle;
    }

    .btn-primary {
        background: linear-gradient(135deg, #007bff, #e74c3c);
        border: none;
    }

    .btn-danger {
        background: #e74c3c;
        border: none;
    }

    .btn-danger:hover {
        background: #c0392b;
    }
</style>

@endsection
