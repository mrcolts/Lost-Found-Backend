<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Category;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->name;
    $category = Category::inRandomOrder()->get();
    return [
        'title' => $faker->lexify('??????'),
        'description' => $faker->lexify('?????? ???????????? ??? ????????????????????'),
        'category_id' => $category,
    ];
});
