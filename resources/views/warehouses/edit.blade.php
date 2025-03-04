@extends('layouts.main')

@section('content')
<h1>Edit Warehouse</h1>
<form action="{{ route('warehouses.update', $warehouse->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="warehouse_name" class="form-label">Warehouse Name</label>
        <input type="text" name="warehouse_name" id="warehouse_name" value="{{ $warehouse->warehouse_name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location (optional)</label>
        <input type="text" name="location" id="location" value="{{ $warehouse->location }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update Warehouse</button>
</form>
@endsection
