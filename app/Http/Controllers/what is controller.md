# What is controller?

A controller is a class that handles incoming requests and returns responses. It is responsible for processing the request, calling the appropriate model methods, and returning the appropriate response.

## Useful make:controller commands

```bash
# If you want to see all the options that make:controller supports.
php artisan make:controller --help

# --model=Post flag indicates that this controller belongs to the Post model.
php artisan make:controller PostController --resource --model=Post
```

## About resource controllers

Example: `php artisan make:controller PostController --resource`

**--resource** is a special flag that creates a controller with a set of predefined methods.  
Without **--resource**, artisan will generate the PostController which is going to be empty controller only class will be there.  

**--resource** generates the controller with 7 methods:

```php
public function index() {
    // GET /posts (Route: posts.index)
    // Purpose: Display a listing of the resource.
    // Usually retrieves all or paginated records from the database and returns a view or JSON collection.
}

public function create() {
    // GET /posts/create (Route: posts.create)
    // Purpose: Show the HTML form for creating a new resource.
    // Returns a Blade view containing the input form (typically omitted in API-only controllers).
}

public function store(Request $request) {
    // POST /posts (Route: posts.store)
    // Purpose: Store a newly created resource in the database.
    // Validates incoming request data, inserts the new record, and redirects or returns the created resource.
}

public function show(string $id) {
    // GET /posts/{id} (Route: posts.show)
    // Purpose: Display the specified resource by ID.
    // Fetches a single record from the database and renders its detail page or returns JSON data.
}

public function edit(string $id) {
    // GET /posts/{id}/edit (Route: posts.edit)
    // Purpose: Show the HTML form for editing an existing resource.
    // Finds the record by ID and passes its data to a Blade view with a pre-filled form (omitted in API-only controllers).
}

public function update(Request $request, string $id) {
    // PUT/PATCH /posts/{id} (Route: posts.update)
    // Purpose: Update the specified resource in the database.
    // Validates the incoming changes, updates the database record matching the ID, and redirects or returns the updated resource.
}

public function destroy(string $id) {
    // DELETE /posts/{id} (Route: posts.destroy)
    // Purpose: Remove/delete the specified resource from the database.
    // Deletes the record matching the ID and redirects or returns a success response.
}
```
