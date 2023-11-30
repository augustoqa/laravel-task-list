@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">
        &larr; Go Back to the task list!
    </a>
</div>

<p class="mb-4 text-slate-700">{{ $task->description }}</p>

@if ($task->long_description)
    <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
@endif

<p class="mb-4 text-sm text-slate-500">
    Created {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }}
</p>

<p class="mb-4">
    <span @class(['font-medium', 'text-green-500' => $task->completed, 'text-red-500' => !$task->completed])>
        {{ $task->completed ? 'Completed' : 'Not Completed' }}
    </span>
</p>

<div class="flex gap-2">
    <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit</a>

    <form action="{{ route('tasks.toggle', ['task' => $task]) }}" method="post">
        @csrf
        @method('PUT')
        <button class="btn">
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
    </form>
    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="post">
        @csrf @method('DELETE')
        <button class="btn">Delete</button>
    </form>
</div>
@endsection
