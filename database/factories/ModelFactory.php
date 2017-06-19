<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */


$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->username,
        'password' => $password ?: $password = bcrypt('secret'),
        'lastname' => $faker->lastname,
        'firstname' => $faker->firstname,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Book::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {

    return [
        'student_id' => $faker->unique()->username,
        'student_lastname' => $faker->lastname,
        'student_firstname' => $faker->firstname,
    ];
});
