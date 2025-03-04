@extends('layouts.main')

@section('content')
<h1>Edit Category</h1>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="category_name" class="form-label">Category Name</label>
        <input type="text" name="category_name" id="category_name" value="{{ $category->category_name }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Category</button>
</form>
@endsection
