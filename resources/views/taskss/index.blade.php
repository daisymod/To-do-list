@extends('layouts.basic')
@section('title-block') Dashboard @endsection
@section('content')
    <!-- <h1>Contact page</h1> -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf

    

    @foreach($tasks as $task)
  
      <div>
        <h3>{{$task->name}}</h3>
        <h5>{{$task->description}}</h5>
        <h4> To do date: <small> {{$task->todo_date}} </small> </h4>    
      <div>



    <?php
    $date= new Carbon\Carbon;
    $date1=strtotime($date);
    $date2=strtotime($task->todo_date);
    $sec=$date2-$date1;
    $days=$sec/86400;
    echo round($days);
    if($days<2){
        echo 'Балбес ты пропустил задачу !!!';
    } else {
      echo round($days);
    }
    ?>
      <!-- </div> -->

    {!! Form::open(['route'=>['task.destroy', $task->id], 'method'=>'DELETE']) !!}
    <a href="{{route('task.edit',$task->id)}}" class = "btn btn-info"> Edit </a>
    <!-- <a href="{{route('task.show',$task->id)}}" class = "btn btn-warning"> Show details </a> -->
    <button type="submit" class="btn btn-danger">Delete</button>
    {!! Form::close() !!}


 @endforeach

@endsection
