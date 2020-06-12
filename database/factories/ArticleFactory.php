<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
    	'user_id' => User::inRandomOrder()->first()->id,
    	'title' => $faker->words(rand(3, 7), true),
    	'excerpt' => $faker->sentence,
    	'body' => $faker->text
    ];
});
