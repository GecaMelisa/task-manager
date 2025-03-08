@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}">Create Category</a>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
@endsection
