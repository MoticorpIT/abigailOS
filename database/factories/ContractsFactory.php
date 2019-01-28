<?php

use Faker\Generator as Faker;

$factory->define(App\Contract::class, function (Faker $faker) {
    return [
        'deposit_amount' => $faker->numberBetween($min = 250, $max = 20000),
        'rent_amount' => $faker->numberBetween($min = 500, $max = 10000),
        'rent_due_date' => $faker->numberBetween($min = 1, $max = 30),
        'term_length' => $faker->randomElement($array = array ('1','3','6','12','18','24','36')),
        'term_start' => $faker->date($format = 'm-d-Y', $max = 'now'),
        'term_ended' => $faker->optional()->randomElement($array = array ('1','2','3','4','5','6')),
        'tenant_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'asset_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
    ];
});
