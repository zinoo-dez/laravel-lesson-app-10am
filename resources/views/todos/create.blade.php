@extends('layouts.app')

@section('title', 'Create Todo')

@section('content')
    <h1>Create Todo</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Completed</label>
            <input type="checkbox" class="form-check-input" id="completed" name="completed" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Create Todo</button>
    </form>
@endsection
