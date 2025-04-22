@extends('layout')

@section('content')
<div class="max-w-md mx-auto mt-8 bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-700 mb-4">Edit Task</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded-md mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $task->title }}"
            class="w-full border p-2 rounded focus:outline-blue-500" placeholder="Task Title">

        <textarea name="description"
            class="w-full border p-2 rounded focus:outline-blue-500" placeholder="Task Description">{{ $task->description }}</textarea>

        <label class="flex items-center space-x-2">
            <input type="checkbox" name="is_completed" {{ $task->is_completed ? 'checked' : '' }} class="form-checkbox">
            <span class="text-gray-700">Completed</span>
        </label>

        <button type="submit"
            class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Update Task
        </button>
        <a href="{{ route('tasks.index') }}" 
            class="w-full bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition text-center block">
            Cancel
        </a>
    </form>
</div>
@endsection