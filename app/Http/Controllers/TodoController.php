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
        $all = Todo::all(); // eloquent orm
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
        $todo = new Todo();
        $todo->name = $request->name;
        $todo->completed = $request->completed ? true : false;
        $todo->save();
        return redirect()->route("todos.index");
    }
}
