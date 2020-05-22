@extends('layouts.basic')

@section('title-block') {{$data->name}} @endsection

@section('content')
    <h1>{{$data->name}}</h1>
    <div class="alert alert-info">
        <p>{{ $data->description }}</p>
        <p>{{ $data->owner }}</p>
        <p>{{ $data->status }}</p>
        <p><smal>{{ $data->todo_date}}</smal></p>
        <a href="{{ route('task-update-done', $data->id) }}"><button class="btn btn-primary">Edit</button></a>
        <a href="{{ route('task-delete-done', $data->id) }}"><button class="btn btn-danger">Delete</button></a>
    </div>
@endsection
