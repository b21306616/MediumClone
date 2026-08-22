<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::get(); // Fetch all categories from the database
        $posts = Post::orderBy('created_at', 'desc')->get(); // Fetch all posts from the database and order them by creation date in descending order

        // ============================================================================================================================
        //                                  Pass the data to the dashboard view using the compact function.

        // The compact function creates an array containing variables and their values.
        // Notice that compact('categories', 'another_variable') = ['categories' => $categories, 'another_variable' => $another_variable]

        // $another_variable = 'Hello World';
        // return view('dashboard', compact('categories', 'another_variable'));
        // ============================================================================================================================
        //                                  Pass the data to the dashboard view using the associative array.

        // Pass the categories and another variable to the dashboard view using an associative array
        // $another_variable = 'Hello World';

        // return view('dashboard', ['categories' => $categories,
        //                           'another_variable' => $another_variable,
        //                           'another_variable2' => 'Hello World 2'
        //                         ]);
        // ============================================================================================================================
        //                                 dd() funtion
        // It is used to print the values on the view-page (used for debugging purposes).

        // For example: dd($categories);
        // Print all values of the $categories array on the dashboard-view-page and stop the execution of the code.

        // dd means, dump and die. It will dump the variable and stop the execution of the code.
        // ============================================================================================================================
        // Renders the dashboard view located in resources/views/dashboard.blade.php
        // Pass the categories data and the posts data to the dashboard view.
        return view('dashboard', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): void
    {
        //
    }
}
