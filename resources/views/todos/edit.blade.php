@extends('todos.layout')

@section('content')
<h1 class="text-center border-bottom border-primary pb-2">Todos Details</h1>

<form action="{{route('todo.update',$todo->id)}}" method="post">
    <div class=" form-row ">
        @csrf
        @method('patch')
        <div class="col-6 align-items-center">
            <input class="form-control" type="text" value="{{$todo->title}}" name="title" id="">
        </div>
        <div class="col-6 align-items-center">
            <textarea class="form-control"  name="description">{{$todo->description}}</textarea>
        </div>
        <div class="col-12 align-items-center">
        @livewire('edit-step',['steps'=>$todo->steps])
        </div>
        <div class="col-4 align-items-center">
            <input class="btn btn-outline-primary ml-2" type="submit" value="Update">
            <a class="btn btn-outline-secondary ml-3" href="/todo">Back</a>
        </div>
    </div>
</form>

<x-alert />
@endsection