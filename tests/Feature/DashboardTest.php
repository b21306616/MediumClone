<?php

use App\Models\Category;
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

test('dashboard displays all tab even when no categories exist', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertOk();
    $response->assertSee('All');
});
