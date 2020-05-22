@extends('layouts.basic')
@section('title-block') Dashboard @endsection
@section('content')
    <h1>Share task page</h1>
    @include('inc.tasks')
    <form action="{{ route('task-shared-submit', $data->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Task</label>
            <input class="form-control" type="text" name="name" value="{{$data->name}}" placeholder="Task name" id="name" disabled>
        </div>
        <div class="form-group">
            <label for="todo_date">Deadline</label>
            <input class="form-control" type="date" name="todo_date" placeholder="Deadline" value="{{$data->todo_date}}" id="todo_date" disabled>
        </div>
        <div class="form-group">
            <label for="shared_user">Email</label>
            <input class="form-control" type="text" name="shared_user" placeholder="Enter email of sharing user" id="shared_user">
        </div>
        <input class="form-control" type="hidden" value="{{ Auth::user()->email }}" name="owner">
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
