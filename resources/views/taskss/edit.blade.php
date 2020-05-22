@extends('layouts.main')

    @section('title','Create Task')

        @section('content')

         <h1> Edit Task</h1>
        
         {!! Form::model($task,['route'=>['task.update',$task->id],'method'=>'PUT']) !!} 

            @component('components.taskform')
            @endcomponent

         {!! Form::close() !!}

        @endsection

        <!-- PUT is for data deliver, recommended to use in updating data -->