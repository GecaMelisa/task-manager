@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <h1>Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" required>
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create Task</button>
    </form>
@endsection
