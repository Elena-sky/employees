<?php

use Faker\Generator as Faker;
use App\Employees as Employees;

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


$factory->define(Employees::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'salary' => $faker->numberBetween($min = 1000, $max = 60000),
        'position' => $faker->jobTitle,
        'parent_id' => $faker->numberBetween($min = 1, $max = 2000),
        'photo' => $faker->numberBetween($min = 1, $max = 4),
    ];


});


