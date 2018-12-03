<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'note' => $faker->text($maxNbChars = 160),
        'company_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'account_id' => $faker->optional()->randomElement($array = array ('1','2','3','4','5','6')),
        'asset_id' => $faker->optional()->randomElement($array = array ('1','2','3','4','5','6')),
        'tenant_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'user_id' => $faker->randomElement($array = array ('1','2','3')),
        'status_id' => $faker->randomElement($array = array ('1','2')),
    ];
});
