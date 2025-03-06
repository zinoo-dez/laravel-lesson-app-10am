<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //
    public function index()
    {
        // $all = DB::table("todos")->get(); // raw sql
        $all = Todo::paginate(5)->withQueryString(); // eloquent orm
        // return $all;
        return view("todos.index", ['todos' => $all]);
    }
    // create form
    public function create()
    {
        return view("todos.create");
    }
    // store data
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string|max:255|min:8',
            'completed' => 'boolean',
        ]);
        Todo::create($request->all()); // eloquent orm(model)
        // $todo = new Todo();
        // $todo->name = $request->name;
        // $todo->completed = $request->completed ? true : false;
        // $todo->save();
        return redirect()->route("todos.index")->with('success', 'Todo created successfully');
    }

    public function edit(Todo $todo)
    {
        // return $todo;
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:8',
            'completed' => 'boolean',
        ]);
        $todo->completed = $request->completed ? true : false;
        $todo->update($request->all());
        return redirect()->route("todos.index")->with('success', 'Todo Update successfully');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route("todos.index")->with('success', 'Todo Delete successfully');
    }
}
