<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Category;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $category = Category::inRandomOrder()->get();
    print($category->id);
    dd($category->id);
    return [
        'title' => $faker->lexify('??????'),
        'description' => $faker->lexify('????????? ??? ???????? ??? ??????????????????'),
        'category_id' => $category->id,
    ];
});
