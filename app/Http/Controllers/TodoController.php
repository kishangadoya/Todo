<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TodoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');//->except('index') Or only('auth')[for single function]
    }
    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        // return $todos;
        
        // $todos = ToDo::orderBy('completed',)->get();
        return view('todos.index',compact('todos'));
        // return $todos;
    	// return view('todos.index')->with(['todos' => $todos]);
    }
 	public function create()
    {
    	return view('todos.create');
    }

     public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }
    //Visit:app/http/Request/TodoCreateRequest.php
    public function store(TodoCreateRequest $request)//TodoCreateRequest=For validation
    {
        // ****** Validation with CUSTOM message ******
        // $rules = [
        //     'title' => 'required|max:255',
        // ];
        // $messages = [
        //     'title.max' => 'ToDo title should not be greater than 255 chars.' ,
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);
        // if($validator->fails())
        // {
        //     return redirect()->back()
        //             ->withErrors($validator)
        //             ->withInput();
        // }


        // ****** Validation with DEFAULT message ******

        // $request->validate([
        //     'title' => 'required|max:255',
        // ]);



        // ****** not appropriate way to validate ... ******

        // if (!$request->title) {
        //     return redirect()->back()->with('error','Please give title');
        // }
         // dd($request->all());

        // dd(auth()->user()->todos);
        // Todo::create($request->all());


        
        // $userId = auth()->id();
        // $request['user_id'] = $userId ;

        // dd($request->all());
        // dd($request->all());
        auth()->user()->todos()->create($request->all());
        return redirect(route('todo.index'))->with('message','ToDo Created Sucessfully !');
    }
 	public function edit(Todo $todo)
    {
        // dd($todo->title);
        // $todo = Todo::find($id);
        return view('todos.edit',compact('todo'));
        // return $todo;
        // dd($id);
    	//return view('todos.edit');
    }
    public function update(TodoCreateRequest $request, Todo $todo)//TodoCreatedRequest refer line :24(Store function !)
    //By putting TodoCreateRequest-Same validation can be applied to this field
    {
        $todo->update (['title' => $request->title,'description' => $request->description]);
        
        return redirect(route('todo.index'))->with('message','Updated !');
        // dd($request->all ());
    }
    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message','Task marked as completed !');
    }
     public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message','Task marked as incompleted !');
    }
     public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message','Task deleted !');
    }
       
}
