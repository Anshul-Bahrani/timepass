<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'title' => $faker->sentence,
        'body' =>$faker->paragraphs(3, true)
    ];
});
