@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-lg-offset-6" style="margin:auto">
            <form action="/create/todo" method="POST">
            @csrf
                <input type="text" class="form-control" name="todo" placeholder="Create a new todos">
            </form>
        </div>
    </div>
    @foreach($todos as $todo)
        {{$todo->todo}} <a href ="{{ route('todo.delete', ['id'=>$todo->id])}}" class="btn btn-danger">x</a>
        <a href ="{{ route('todo.update', ['id'=>$todo->id])}}" class="btn btn-primary">update</a>
        @if(!$todo->completed)
            <a href ="{{route('todo.completed', ['id'=>$todo->id])}}" class="btn btn-xs btn-success">Mark as Completed</a>
        @else
            <span class="text-success">Completed! </span>

        @endif

        <hr>
    @endforeach
@endsection