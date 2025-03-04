@extends('layouts.main')

@section('content')
<h1>Transaction History</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Action</th>
            <th>Product</th>
            <th>User</th>
            <th>Performed At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($history as $entry)
        <tr>
            <td>{{ $entry->action }}</td>
            <td>{{ $entry->stock->product->product_name }}</td>
            <td>{{ $entry->user->name ?? 'System' }}</td>
            <td>{{ $entry->performed_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
