@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
<div class="mb-4">
    <a href="{{ route('tasks.create') }}" class="link">Add Task</a>
</div>
<div>
    @forelse($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['task' => $task->id])}}"
                @class(['line-through' => $task->completed])
            >
                {{$task->title}}
            </a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    <nav class="mt-4">
        {{ $tasks->links() }}
    </nav>
</div>
@endsection
