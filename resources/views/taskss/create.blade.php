@extends('layouts.main')


    @section('title', 'Create Task')

        @section('content')
        <center>
        <div class="row">
            
            <col-wm-12>
                <h1> Create Task </h1>

                <!-- {!! Form::open(['route'=>'task.store', 'method'=>'POST']) !!} -->

                @component('components.taskform')

                @endcomponent()

                <!-- {!! Form::close() !!} -->

            </col-wm-12>
        </div
        </center>

        @endsection
