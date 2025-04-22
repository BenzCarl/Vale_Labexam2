@extends('layout')

@section('content')
<div class="max-w-md mx-auto mt-8 bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-700 mb-4">Create Task</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded-md mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Task Title" value="{{ old('title') }}"
            class="w-full border p-2 rounded focus:outline-blue-500">

        <textarea name="description" placeholder="Task Description"
            class="w-full border p-2 rounded focus:outline-blue-500">{{ old('description') }}</textarea>

        <button type="submit"
            class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Create Task
        </button>
        <a href="{{ route('tasks.index') }}" 
            class="w-full bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition text-center block">
            Cancel
        </a>
    </form>
</div>
@endsection