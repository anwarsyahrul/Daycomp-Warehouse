@extends('layouts.main')

@section('content')
<h1>Add Category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="category_name" class="form-label">Category Name</label>
        <input type="text" name="category_name" id="category_name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Category</button>
</form>
@endsection
