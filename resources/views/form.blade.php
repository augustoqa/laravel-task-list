@section('title', isset($task) ? 'Edit Task' : 'Create a Task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: .8rem;
        }
    </style>
@endsection

@section('content')
<form 
    action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" 
    method="POST"
>
    @csrf
    @isset($task)
        @method('PUT')
    @endisset

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $task->title ?? old('title') }}" id="title">
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea 
            name="description" 
            id="description" 
            rows="5"
        >{{ $task->description ?? old('description') }}</textarea>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description">Long Description</label>
        <textarea 
            name="long_description" 
            id="long_description" 
            rows="10"
        >{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">
            @isset($task)
                Update Task
            @else
                Add Task
            @endisset
        </button>
    </div>
</form>
@endsection