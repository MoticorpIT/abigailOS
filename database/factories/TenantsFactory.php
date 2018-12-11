<?php

use Faker\Generator as Faker;

$factory->define(App\Tenant::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_1' => $faker->phoneNumber,
        'phone_2' => $faker->optional()->phoneNumber,
        'fax' => $faker->optional()->phoneNumber,
        'email' => $faker->optional()->safeEmail,
        'co_first_name' => $faker->optional()->firstName,
        'co_last_name' => $faker->optional()->lastName,
        'co_phone_1' => $faker->optional()->phoneNumber,
        'co_phone_2' => $faker->optional()->phoneNumber,
        'co_email' => $faker->optional()->safeEmail,
        'street_1' => $faker->streetAddress,
        'street_2' => $faker->optional()->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'status_id' => $faker->randomElement($array = array ('1','2')),
        'account_standing_id' => $faker->randomElement($array = array ('1','2')),
    ];
});
