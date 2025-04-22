@extends('layout')

@section('content')
<h1 class="mb-4">Edit Task</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST" class="p-4 bg-light rounded shadow">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" placeholder="Enter task title">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="Enter task details">{{ $task->description }}</textarea>
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input" {{ $task->is_completed ? 'checked' : '' }}>
        <label for="is_completed" class="form-check-label">Completed</label>
    </div>

    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
@endsection