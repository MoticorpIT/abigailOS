<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'note' => $faker->text($maxNbChars = 160),
        'company_id' => $faker->numberBetween($min = 1, $max = 20),
        'account_id' => $faker->optional()->numberBetween($min = 1, $max = 20),
        'asset_id' => $faker->optional()->numberBetween($min = 1, $max = 20),
        'tenant_id' => $faker->numberBetween($min = 1, $max = 20),
        'user_id' => $faker->randomElement($array = array ('1','2','3')),
        'edited_by_user_id' => null,
        'status_id' => $faker->randomElement($array = array ('1','2')),
    ];
});
