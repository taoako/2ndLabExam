@extends('layout')

@section('content')
<div class="card shadow">
    <div class="card-header bg-warning">
        <h4 class="mb-0">Edit Task</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                @error('title')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Task Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $task->description }}</textarea>
                @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="is_completed" name="is_completed" {{ $task->is_completed ? 'checked' : '' }}>
                <label class="form-check-label" for="is_completed">Mark as Completed</label>
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection