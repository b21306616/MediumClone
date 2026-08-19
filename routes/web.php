<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
