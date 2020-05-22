@extends('layouts.basic')

@section('title-block') {{$data->name}} @endsection

@section('content')
    <h1>{{$data->name}}</h1>
    <div class="alert alert-info">
        <p>{{ $data->description }}</p>
        <p>{{ $data->owner }}</p>
        <p>{{ $data->status }}</p>
        <p><smal>{{ $data->todo_date}}</smal></p>
        <a href="{{ route('task-update', $data->id) }}"><button class="btn btn-primary">Edit</button></a>
        <a href="{{ route('task-delete', $data->id) }}"><button class="btn btn-danger">Delete</button></a>
        <a href="{{ route('task-shared', $data->id) }}"><button class="btn btn-primary">Share</button></a>
    </div>
@endsection
