@extends('layout.mainlayout')
@section('content')

    <div class="container">
        <h1>Showing Task [{{ $task->title }}]</h1>
        <hr>
        <div class="jumbotron jumbotron-fluid">
            <p>
                <strong>Task title: </strong> {{ $task->title }} <br>
                <strong>Task Description: </strong> {{ $task->description }} <br>
            </p>
        </div>

    </div>

@endsection