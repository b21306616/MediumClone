<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//================================================================================================================================================================
//                                                          Render the dashboard view using closure function

/*
Route::get('/dashboard', function () {
    return view('dashboard'); // Renders the dashboard view located in resources/views/dashboard.blade.php
})->middleware(['auth', 'verified'])->name('dashboard');
*/
//================================================================================================================================================================
//                                                          Render the dashboard view using controller method

// get('/dashboard', [PostController::class, 'index'])
// The above line means, when a GET request is made to the /dashboard URL, the index method of the PostController will be executed.

// middleware(['auth', 'verified'])
// The above line means, the dashboard route is protected by the auth and verified middleware.

// 'auth': Checks if the user is logged in. If they are a guest (not authenticated), Laravel redirects them to the /login page.
// 'verified': Checks if the user has confirmed/verified their email address. If they haven't, Laravel redirects them to the email verification notice page.
// IF ANY MIDDLEWARE CHECK FAILS, EXECUTION STOPS IMMEDIATELY AND THE CONTROLLER METHOD IS NEVER CALLED.

// name('dashboard')
// The above line gives this route a unique nickname (dashboard) that you can refer to across your application.
// Instead of hardcoding URLs (like href="/dashboard"), you use Laravel's route() helper.

// For example:
// In a Blade template, you can use: <a href="{{ route('dashboard') }}">Dashboard</a>
// In a controller, you can use: return redirect()->route('dashboard');

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
//================================================================================================================================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ================================================================================================================================================================
//                                                               Example 1 route for testing purposes

// We are going to listen to get requests to the /hello endpoint and return a simple response
Route::get('/hello-world', function () {
    // We can return something as a string or as a view
    return 'Hello, World!';
});
// THE RESULT:
// Go visit http://127.0.0.1:8001/hello
// You should see the message "Hello, World!"
// ================================================================================================================================================================
//                                                               Example 2 route for testing purposes

// However, we can also return a view instead of a string.
// Let's create a new view called hello.blade.php in the resources/views directory and return it from the route.
Route::get('/hello', function () {
    // Return a view with a variable passed to it.

    // Option 1:
    // return view('hello', ['name' => 'Begench']);

    // Option 2:
    // return view('hello')->with('name', 'Begench');

    // Option 3:
    $name = 'Begench';

    return view('hello', compact('name'));
});

// Option 4 (Passing from a URL route parameter):
Route::get('/hello/{name}', function (string $name) {
    return view('hello', ['name' => $name]);
});
// ================================================================================================================================================================
