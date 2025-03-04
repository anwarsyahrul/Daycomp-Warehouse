@extends('layouts.main')

@section('content')
<h1>Add Warehouse</h1>
<form action="{{ route('warehouses.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="warehouse_name" class="form-label">Warehouse Name</label>
        <input type="text" name="warehouse_name" id="warehouse_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <textarea name="location" id="location" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Warehouse</button>
</form>
@endsection
