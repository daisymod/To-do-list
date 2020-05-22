@extends('layouts.basic')
@section('title-block') Dashboard @endsection
@section('content')
    <h1>Update page</h1>
    @include('inc.tasks')
    <form action="{{ route('task-update-submit-process', $data->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Enter name of the Task</label>
            <input class="form-control" type="text" name="name" value="{{$data->name}}" placeholder="Task name" id="name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter description">{{$data->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="{{$data->status}}">{{$data->status}}</option>
                <option value="no status">no status</option>
                <option value="Done">Done</option>
            </select>
        </div>
        <div class="form-group">
            <label for="todo_date">Choose Date</label>
            <input class="form-control" type="date" name="todo_date" value="{{$data->todo_date}}" placeholder="Choose date" id="todo_date">
        </div>
        <input class="form-control" type="hidden" value="{{ Auth::user()->email }}" name="owner">
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
