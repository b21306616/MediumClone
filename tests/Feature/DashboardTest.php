<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

test('guests are redirected to login when accessing dashboard', function () {
    $response = $this->get(route('dashboard'));

    $response->assertRedirect(route('login'));
});

test('authenticated users can view all tab and category tabs on dashboard', function () {
    $user = User::factory()->create();
    $categoryA = Category::factory()->create(['name' => 'Technology']);
    $categoryB = Category::factory()->create(['name' => 'Science']);

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertOk();
    $response->assertSee('All');
    $response->assertSee('Technology');
    $response->assertSee('Science');
});

test('authenticated users can view rich post cards in newest first order', function () {
    $user = User::factory()->create();
    $technology = Category::factory()->create(['name' => 'Technology']);
    $science = Category::factory()->create(['name' => 'Science']);

    $olderPost = Post::factory()->create([
        'user_id' => $user->id,
        'category_id' => $science->id,
        'title' => 'An older science story',
        'slug' => 'an-older-science-story',
        'content' => '<p>A thoughtful summary about a scientific discovery.</p>',
        'image' => 'https://example.com/science.jpg',
        'published_at' => '2026-08-20 10:00:00',
        'created_at' => '2026-08-20 10:00:00',
    ]);
    $newerPost = Post::factory()->create([
        'user_id' => $user->id,
        'category_id' => $technology->id,
        'title' => 'A newer technology story',
        'slug' => 'a-newer-technology-story',
        'content' => '<p>A focused summary about an important technology update.</p>',
        'image' => 'https://example.com/technology.jpg',
        'published_at' => null,
        'created_at' => '2026-08-21 11:00:00',
    ]);

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertOk();
    $response->assertSeeInOrder([$newerPost->title, $olderPost->title]);
    $response->assertSee('A focused summary about an important technology update.');
    $response->assertSee('A thoughtful summary about a scientific discovery.');
    $response->assertSee('Technology');
    $response->assertSee('Science');
    $response->assertSee('https://example.com/technology.jpg');
    $response->assertSee('https://example.com/science.jpg');
    $response->assertSee('Aug 21, 2026');
    $response->assertSee('Aug 20, 2026');
    $response->assertDontSee('<p>A focused summary', false);
});

test('dashboard displays an image fallback for posts without an image', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create(['name' => 'Technology']);
    $post = Post::factory()->create([
        'user_id' => $user->id,
        'category_id' => $category->id,
        'slug' => 'a-story-without-an-image',
        'image' => null,
    ]);

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertOk();
    $response->assertSee('No image available');
    $response->assertSee('data-testid="post-image-fallback-'.$post->id.'"', false);
});

test('dashboard displays an empty state when no posts exist', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertOk();
    $response->assertSee('All');
    $response->assertSee('No stories yet');
    $response->assertSee('New articles will appear here when they are available.');
});
