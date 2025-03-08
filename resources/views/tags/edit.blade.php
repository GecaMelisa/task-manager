@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Tag</h1>
        <form action="{{ route('tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tag Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $tag->name) }}" required>
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Tag</button>
        </form>
    </div>
@endsection
