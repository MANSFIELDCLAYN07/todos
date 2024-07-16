@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Todo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('todos.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $todo->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $todo->description }}</textarea>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Status:</strong>
            <select name="status" class="form-control">
                <option value="pending" {{ $todo->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $todo->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Due Date:</strong>
            <input type="date" name="due_date" value="{{ $todo->due_date }}" class="form-control" placeholder="Due Date">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-10 text-center">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>


    </form>
</div>
@endsection
