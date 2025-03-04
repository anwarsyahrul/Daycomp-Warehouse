@extends('layouts.main')

@section('content')
<h1>Warehouses</h1>
<a href="{{ route('warehouses.create') }}" class="btn btn-primary mb-3">Add Warehouse</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($warehouses as $warehouse)
        <tr>
            <td>{{ $warehouse->warehouse_name }}</td>
            <td>{{ $warehouse->location }}</td>
            <td>
                <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
