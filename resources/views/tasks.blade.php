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
            <?php
            $date= new Carbon\Carbon;
            $date1=strtotime($date);
            $date2=strtotime($task->todo_date);
            $sec=$date2-$date1;
            $days=$sec/86400;
            //echo round($days);
            if($days<2){
                echo '<b style="color:red">Task deadline expired !!!</b>' . '<br><br>';
             }
            ?>
            <a href="{{ route('task-data-one', $task->id) }}"><button class="btn btn-warning">More</button></a>
        </div>
    @endforeach
@endsection
