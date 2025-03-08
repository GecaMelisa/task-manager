@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <h1>Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
        </div>
        <button type="submit">Update Category</button>
    </form>
@endsection
