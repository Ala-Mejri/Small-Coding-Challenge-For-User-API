<?php

use Faker\Generator as Faker;

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
$sex=['male','female'];
$factory->define(App\User::class, function (Faker $faker) use ($sex) {
    return [
        'givenName' => $faker->name,
        'familyName' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 123456,
        'remember_token' => str_random(10),
        'sex'=> $sex[array_rand($sex)]
    ];
});
