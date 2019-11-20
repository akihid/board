<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Board::class, function (Faker $faker) {
    return [
      'title' => $faker->realText(10),
      'body' => $faker->realText(20),
      'user_id' => function () {
        return factory(App\User::class)->create()->id;
      },
    ];
});
