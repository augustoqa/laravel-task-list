@extends('layouts.app')

@section('title', $task->title)

@section('content')
<p>{{ $task->description }}</p>

<p>{{ $task->long_description }}</p>

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

<p>
    {{ $task->completed ? 'Completed' : 'Not Completed' }}
</p>

<div>
    <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
</div>

<div>
    <form action="{{ route('tasks.toggle', ['task' => $task]) }}" method="post">
        @csrf
        @method('PUT')
        <button>
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
    </form>
</div>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="post">
            @csrf @method('DELETE')
            <button>Delete</button>
        </form>
    </div>
@endsection
