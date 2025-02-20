<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // view() function is used to render a view file(frontend page)
    return view('home');
});

Route::get("/hello", function () {
    return "Hello, World!";
});
Route::get("/about", function () {
    return view("about");
});
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
});
