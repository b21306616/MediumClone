<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<PostFactory> */

    // If this model has a factory, we can use the HasFactory trait to make it easier to create instances of this model.
    use HasFactory;
}
