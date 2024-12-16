@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">🖉 Create Task</a>
    </nav>

    @if (count($tasks))
        <ol>
            @foreach ($tasks as $task)
                <li>
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                        @class(['line-through' => $task->completed])>{{ $task->title }}</a>
                </li>
            @endforeach
        </ol>
    @else
        <div>There are no tasks!</div>
    @endif

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
