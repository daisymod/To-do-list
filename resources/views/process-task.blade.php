@extends('layouts.basic')

@section('title-block') Task page @endsection

@section('content')
    <h1>Task page</h1>
    @foreach($data as $task)
        <div class="alert alert-info">
            <h3>{{ $task->name }}</h3>
            <p>{{ $task->description }}</p>
            <p>{{ $task->status }}</p>
            <p><smal>{{ $task->todo_date }}</smal></p>
            <a href="{{ route('task-data-one-process', $task->id) }}"><button class="btn btn-warning">More</button></a>
        </div>
    @endforeach
@endsection
