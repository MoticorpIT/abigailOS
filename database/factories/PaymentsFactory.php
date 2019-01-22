<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'amount_paid' => $faker->numberBetween($min = 250, $max = 20000),
        'method' => $faker->randomElement($array = array ('Check','Cash','Card','Money Order')),
        'check_num' => $faker->numberBetween($min = 250, $max = 20000),
        'invoice_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
