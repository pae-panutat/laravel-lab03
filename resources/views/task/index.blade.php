@extends('layout.mainlayout')
@section('content')

   <div class="container">
       @if (Session::has('message'))
           <div class="alert alert-info">{{ Session::get('message') }}</div>
       @endif
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task Title</th>
                <th scope="col">Task Description</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($task as $tasks)
                <tr>
                    <th scope="row">{{ $tasks->id }}</th>
                    <td><a href="/tasks/{{ $tasks->id }}">{{ $tasks->title }}</a></td>
                    <td>{{ $tasks->description }}</td>
                    <td>{{ $tasks->created_at->toFormattedDateString() }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('tasks/' . $tasks->id . '/edit') }}">
                            <button type="button" class="btn btn-warning btn-sm">Edit</button>
                            </a>
                            <form action="{{ url('tasks', [$tasks->id]) }}" method="post">
                                @csrf @method('DELETE')
                                {{-- <input type="hidden" name="_token" value=""{{ csrf_token() }}> --}}
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   </div>

@endsection