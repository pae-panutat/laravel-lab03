@extends('layout.mainlayout')
@section('content')

   <div class="container">
       @if (Session::has('message'))
           <div class="alert alert-info">{{ Session::get('message') }}</div>
       @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task Title</th>
                <th scope="col">Task Description</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($task as $tasks)
                <tr>
                    <th scope="row">{{ $tasks->id }}</th>

                </tr>
            @endforeach
        </tbody>
    </table>
   </div>

@endsection