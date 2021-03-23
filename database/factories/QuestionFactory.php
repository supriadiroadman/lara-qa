<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(), "."), // bla bla.  => bla bla
        'body' => $faker->paragraphs(rand(2, 5), true), // min: 2 paragraph, true => /n (linebreak)
        'votes' => rand(-3, 10), // can minus
        'views' => rand(0, 10),
        'answers_count' => rand(0, 10),
        'user_id' => 1
    ];
});
