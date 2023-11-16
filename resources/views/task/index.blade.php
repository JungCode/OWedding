


@extends('layouts.toolweb.tools')

@section('title', 'the list of task')

@section('content')
        
    @forelse ($tasks as $task )
        <div>
            <a href="{{ route('tasks.show',['task' =>$task->id]) }}"
            @class(['line-through' => $task->completed])>
                {{$task->title}}
            </a>
        </div>
        @empty
            <div>there no tasks</div>
    @endforelse

  
@endsection