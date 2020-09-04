@extends('todos.layout')

@section('content')
<div class="text-center border-bottom border-primary pb-2">
    <h1>What to do next</h1>
    <a href="{{route('todo.index')}}" class="btn ">
        <span class="fa fa-arrow-left text-dark"></span>

    </a>
</div>

<form action="{{route('todo.store')}}" method="post">
    @csrf
    <div class=" form-row ">

        <div class="col-12 align-items-center">
            <label>Title</label>
            <input class="form-control" type="text" name="title" id="">

        </div>
        <div class="col-12 align-items-center">
            <label>Description</label>
            <textarea class="form-control" rows="5" name="description" id=""></textarea>

        </div>
    </div>


    <div>
        
        
        @livewire('step')
        
    </div>
    <input class="btn btn-outline-primary" type="submit" value="Create Todo">
</form>
<x-alert />
@endsection