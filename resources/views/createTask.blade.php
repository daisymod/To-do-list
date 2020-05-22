@extends('layouts.basic')
@section('title-block') Dashboard @endsection
@section('content')
    @include('inc.tasks')
    <form action="{{ route('task-form') }}" method="post">
        @csrf
        <div class="form-group pt-3">
            <label for="name">Enter name of the Task</label>
            <input class="form-control" type="text" name="name" placeholder="Task name" id="name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter description"></textarea>
        </div>
        <div class="form-group">
            <label for="todo_date">Choose Date</label>
            <input class="form-control" type="date" name="todo_date" placeholder="Choose date" id="todo_date">
        </div>
        <input class="form-control" type="hidden" value="{{ Auth::user()->email }}" name="owner">
        <input class="form-control" type="hidden" value="no status" name="status">
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
