<?php

use Faker\Generator as Faker;

$factory->define(App\Repeat::class, function (Faker $faker) {
    return [
        'start_date' => $faker->date($format = 'm-d-Y'),
        'interval' => $faker->randomElement($array = array ('Daily','Weekly','Monthly','Yearly')),
        'task_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'invoice_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'status_id' => $faker->randomElement($array = array ('1','2')),
    ];
});
