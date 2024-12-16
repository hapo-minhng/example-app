@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">⇦ Go back to the
            Task List</a>
    </nav>

    <ul>
        <li>
            <p class="mb-4 text-slate-700"><strong>Description:</strong> {{ $task->description }}</p>
        </li>
        @if ($task->long_description)
            <li>
                <p class="mb-4 text-slate-700"><strong>Long description:</strong> {{ $task->long_description }}</p>
            </li>
        @endif
        <li>
            <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} · Updated
                {{ $task->updated_at->diffForHumans() }}</p>
        </li>
        <li>
            <p class="mb-4 text-slate-700"><strong>Task status:</strong>
                @if ($task->completed)
                    <span class="font-medium text-green-500">
                        Completed
                    </span>
                @else
                    <span class="font-medium text-red-500">
                        Not completed
                    </span>
                @endif
            </p>
        </li>
    </ul>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn">🖋 Edit Task</a>

        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">❌ Delete</button>
        </form>
    </div>
@endsection
