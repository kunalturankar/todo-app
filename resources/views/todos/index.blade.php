@extends('todos.layout')

@section('content')
<div class="text-center border-bottom border-primary pb-2">
  <h1>Todos List</h1>
  <a href="{{route('todo.create')}}" class="text-primary" title="Click to Create Todo">
    <span class="fa fa-plus-circle fa-2x"></span>
  </a>
</div>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>Status</th>
      <th scope="col">Title</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    @forelse($todos as $todo)
    <tr>
    <th>
      @include('todos.complete-button')
    </th>
      @if($todo->completed)
      <td><s>{{$todo->title}}</s></td>
      @else
      <td><a class="btn" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a></td>
      @endif
      <td>
        <a class="btn " href="{{route('todo.edit',$todo->id)}}"><span class="fa fa-edit  btn text-warning"></span></a>
        <span class="fa fa-trash  btn text-danger" onclick="event.preventDefault();
        if(confirm('Are you really want to delete ?')){
          document.getElementById('form-delete-{{$todo->id}}')
        .submit();
        }
        "></span>
        <form style="display: none;" id="{{'form-delete-'.$todo->id}}" action="{{route('todo.destroy',$todo->id)}}" method="post">
          @csrf
          @method('delete')
        </form>
      </td>

    </tr>
    @empty
    <tr>
      <td>-</td>
      <td>-</td>
      <td>-</td>
    </tr>
    @endforelse
  </tbody>
</table>
<x-alert />
@endsection