<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'user_id' => function () {
            return create('App\User')->id;
        },
        'title' => $title,
        'body' => $faker->paragraph,
    ];
});
