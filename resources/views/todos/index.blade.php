@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Todos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('todos.create') }}"> Create New Todo</a>
                
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    @if ($todos->isEmpty())
        <div class="alert alert-warning">
            <p>No tasks available.</p>
        </div>
    @else
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Due Date</th>
                <th width="280px">Action</th>
            </tr>
            
            @php $i = 0; @endphp
            @foreach ($todos as $todo)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $todo->name }}</td>
                <td>{{ $todo->description }}</td>
                <td>{{ $todo->due_date }}</td>
                <td>
                    <form action="{{ route('todos.destroy',$todo->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('todos.show',$todo->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('todos.edit',$todo->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @endif
</div>
@endsection
