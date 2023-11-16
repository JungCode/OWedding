@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Add Task')

@section('content')
<form method="POST"
    action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">Title</label>
            <input text="text" name="title" id="title"
                   @class(['border-red-500' => $errors->has('title')])
                   value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="3"
                      @class(['border-red-500' => $errors->has('description')])>
                {{ $task->description ?? old('description') }}
            </textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror 
        </div>
        <div>
            <label for="Period">Period</label>
            <textarea name="period" id="period" rows="2"
                      @class(['border-red-500' => $errors->has('period')])>
                {{ $task->period ?? old('period') }}
            </textarea> 
            @error('period')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-2">
            <button class="btn" type="submit">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="btn">
                Cancel
            </a>
        </div>
    </form>
@endsection