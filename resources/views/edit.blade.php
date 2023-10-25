@extends('layouts.app666')

@section('content')
    @include('form', ['task' => $task])
@endsection