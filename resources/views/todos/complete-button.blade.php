@if($todo->completed)
        <span class="fa fa-check fa-2x text-success btn px-2" onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit();"></span>
        <form style="display: none;" id="{{'form-incomplete-'.$todo->id}}" action="{{route('todo.incomplete',$todo->id)}}" method="post">
          @csrf
          @method('delete')
        </form>
        @else
        <span class="fa fa-check fa-2x text-secondary btn px-2" onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit();"></span>
        <form style="display: none;" id="{{'form-complete-'.$todo->id}}" action="{{route('todo.complete',$todo->id)}}" method="post">
          @csrf
          @method('put')
        </form>
        @endif