<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
    return [
        'invoice_num' => $faker->numberBetween($min = 1001, $max = 9999),
        'due_date' => $faker->date($format = 'Y-m-d'),
        'amount_due' => $faker->numberBetween($min = 250, $max = 20000),
        'balance' => $faker->numberBetween($min = 250, $max = 20000),
        'contract_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'priority_id' => $faker->randomElement($array = array ('1','2','3')),
        'status_id' => $faker->randomElement($array = array ('1','2')),
    ];
});
