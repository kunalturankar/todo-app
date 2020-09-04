@extends('todos.layout')

@section('content')
<div class="text-center border-bottom border-primary pb-2">
  <h1>Todos Details</h1>
  <a href="{{route('todo.index')}}" class="btn ">
        <span class="fa fa-arrow-left text-dark"></span>

    </a>
</div>

<div class="text-justify">
    <h2 class="text-center">{{$todo->title}}</h2>
    <h3> Description</h3>
    <p class="pt-2">{{$todo->description}}</p>
     
</div>
<div>
@if($todo->steps->count() >0)
<h3> Steps</h3>
@foreach($todo->steps as $step)

    <p>{{$step->name}}</p>

@endforeach
@endif
</div>



@endsection