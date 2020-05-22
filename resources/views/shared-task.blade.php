@extends('layouts.basic')

@section('title-block') Task page @endsection

@section('content')
    <h1>Group tasks page</h1>
    @foreach($data as $task)
        <div class="alert alert-info p-3">
            <h3>{{ $task->name }}</h3>
            <!-- <p>{{ $task->description }}</p> -->
            <p>Deadline: {{ $task->todo_date }}</p>
            <!-- <p>{{ $task->owner }}</p> -->
            <p>Shared user: {{ $task->email }}</p>
            <a href="{{ route('task-data-one-shared', $task->id) }}"><button class="btn btn-warning">More</button></a>
        </div>
    @endforeach
@endsection
