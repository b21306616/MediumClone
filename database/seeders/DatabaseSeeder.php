<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        /*
        NOTE: The UserFactory.php file defines the default blueprint (fallback values) for all user fields.
        The array passed into create([...]) below only overrides specific keys you care about, while keeping all other default fields intact.
        */
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // ==================================================================================================================================================
        //                                                      Seeding the Categories Table in the DB.
        $categories = [
            'Technology',
            'Health',
            'Science',
            'Sports',
            'Politics',
            'Entertainment',
        ];

        foreach ($categories as $category) {
            // Create a new category and save it to the database
            Category::create(['name' => $category]);
        }
        // ==================================================================================================================================================
        //                                                                              Create 50 posts
        // Way 1:
        Post::factory(50)->create(); // Create 50 posts using the PostFactory

        // Way 2:
        $this->call([
            PostSeeder::class, // Call the PostSeeder to seed the posts table
        ]);
        // ==================================================================================================================================================

    }
}
