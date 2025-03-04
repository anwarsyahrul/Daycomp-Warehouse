@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Add Rack</h2>
    <form action="{{ route('racks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rack_name" class="form-label">Rack Name</label>
            <input type="text" name="rack_name" id="rack_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Rack</button>
    </form>
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
