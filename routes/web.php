<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/', 'welcome', [
//     'greeting' => 'Hello',
//     'person' => request('person', 'World'),
//     'tasks' => [
//         'Go to the market',
//         'Walk the dog',
//         'Watch a video tutorial'
//         ]
// ]);
Route::view('/about', 'about');
Route::view('/contact', 'contact');

//This is for chapter 2
Route::get('/', function () {
    // $ideas = session() -> get('ideas', []);

    $ideas = \Illuminate\Support\Facades\DB::table('ideas')->get();

    //return $ideas; ---> Returns (in JSON format) all the ideas in the database, including their id, description, created_at and updated_at
    //return $ideas[0]; ---> Returns the first array in table ideas, including its id, description, created_at and updated_at
    return $ideas[0]->description;//Returns the description of the first array in table ideas
    dd($ideas);

    // return view('ideas', ['ideas' => $ideas]);


});



Route::post('/ideas', function () {

    $idea = request('idea');

    session()->push('ideas', $idea);

    return redirect('/');
});


//Temporary, considered sloppy, but it is for testing purposes only
Route::get('/delete-ideas', function () {
    session()->forget('ideas');

    return redirect('/');
});
