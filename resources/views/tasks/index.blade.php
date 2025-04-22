@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded-lg shadow-md">
    <div>
      <h1 class="text-2xl font-bold text-gray-700 mb-4">Task List</h1>
        <a href="{{ route('tasks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        + Create New Task
        </a>
      </div>
    @if(session('success'))
        <p class="bg-green-100 text-green-700 p-3 rounded mt-3">{{ session('success') }}</p>
    @endif

    <div class="overflow-x-auto mt-4">
        <table class="w-full border-collapse border border-gray-300 rounded-lg">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3">Title</th>
                    <th class="p-3">Description</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr class="border-t hover:bg-gray-100">
                    <td class="p-3 font-medium text-gray-800">{{ $task->title }}</td>
                    <td class="p-3 text-gray-600">{{ $task->description }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-white 
                            {{ $task->is_completed ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $task->is_completed ? 'Completed' : 'Pending' }}
                        </span>
                    </td>
                    <td class="p-3">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Are you sure you want to delete this task?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection