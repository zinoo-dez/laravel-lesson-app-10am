@extends('layouts.app')

@section('title', 'Todos Page')

@section('content')
    <h1>Todos Page</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary">Create New Todo</a>
    <table class="table table-striped mt-4 w-75  m-auto">
        <thead>
            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{ $todo->name }}</td>
                    <td>{{ $todo->completed ? 'Completed' : 'Not Completed' }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
