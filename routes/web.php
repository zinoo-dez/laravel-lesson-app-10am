<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
// index() => main page
Route::get('/', [HomeController::class, 'index'])->name("home");

Route::get("/hello", function () {
    return "Hello, World!";
});
Route::get("/about", function () {
    return view("about");
})->name("about");
Route::get("/posts", function () {
    $all = ["Web Development", "Laravel", "PHP", "JavaScript"];
    $posts = [
        "Web Development" => ["HTML", "CSS", "JavaScript"],
        "Laravel" => ["Eloquent", "Migrations", "Seeds"],
        "PHP" => ["Arrays", "Objects", "Functions"],
        "JavaScript" => ["Promises", "Async", "Objects"]
    ];
    return view("posts", [
        'categories' => $all,
        'posts' => $posts
    ]);
})->name("posts");

Route::get("/todos", [TodoController::class, "index"])->name('todos.index');
Route::get("/todos/create", [TodoController::class, "create"])->name('todos.create');
Route::get("/todos/{todo}/edit", [TodoController::class, "edit"])->name('todos.edit');
Route::post("/todos", [TodoController::class, "store"])->name('todos.store');
Route::put("/todos/{todo}", [TodoController::class, "update"])->name('todos.update');
Route::delete("/todos/{todo}", [TodoController::class, "destroy"])->name('todos.destroy');
