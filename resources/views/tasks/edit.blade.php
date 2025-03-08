@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <div>
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}" required>
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update Task</button>
    </form>
@endsection
