<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Todo;
use App\Step;


class TodoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $todos = auth()->user()->todos()->orderby('completed')->get();
        //$todos=Todo::orderby('completed')->get();
        
        return view('todos.index')->with(['todos'=>$todos]);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(TodoRequest $request){
        //$request->validate([
        //    'title'=>'required',
        //]);
        $todo= auth()->user()->todos()->create($request->all());

        if($request->step){
            foreach($request->step as $step){
                $todo->steps()->create(['name'=>$step]);
            }
    
        }
       
        //Todo::create($request->all());
        return redirect(route('todo.index'))->with('message','Todo created successfully!');
    }

    public function edit(Todo $todo){

        //$todos = Todo::find($id);
        return view('todos.edit',compact('todo'));
    }

    public function update(TodoRequest $request,Todo $todo){

        //$todos = Todo::find($id);
        $todo->update(['title'=>$request->title,'description'=>$request->description]);
        if($request->stepName){
            foreach($request->stepName as $key => $value){
                $id=$request->stepId[$key];

                if(!$id){

                    $todo->steps()->create(['name'=>$value]);

                }else{
                    $step= Step::find($id);
                    $step->update(['name'=>$value]);
                }

                
            }
    
        }
        return redirect(route('todo.index'))->with('message','Todo Title updated');
    }

    public function complete(Todo $todo){

        //$todos = Todo::find($id);
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message','Todo Mark as completed');
    }

    public function incomplete(Todo $todo){

        //$todos = Todo::find($id);
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message','Todo Mark as incompleted');
    }

    public function destroy(Todo $todo){

        //$todos = Todo::find($id);
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message','Task deleted');
    }
    public function show(Todo $todo){

        //$todos = auth()->user()->todos()->orderby('completed')->get();
        //$todos=Todo::orderby('completed')->get();
        
        
        return view('todos.show',compact('todo'));
    }
    
}
