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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'role' => 'user'
    ];
});


$factory->define(App\Consignee::class, function (Faker\Generator $faker) {
    return [
        
        'name' => $faker->company,
        'type' => 'company',
        'address' => $faker->streetAddress,
        'country' => $faker->country,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->safeEmail
    ];
});

$factory->define(App\Driver::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name($gender="male"),
        'id_no' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'company' => $faker->company,
        'phone' => $faker->e164PhoneNumber,
    ];
});