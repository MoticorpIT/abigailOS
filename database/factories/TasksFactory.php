<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'task' => $faker->text($maxNbChars = 160),
        'due_date' => $faker->dateTimeBetween('-1 years', '+2 years'),
        'assigned_user_id' => $faker->randomElement($array = array ('1','2','3')),
        'account_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'company_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'asset_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'task_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'task_type_id' => $faker->randomElement($array = array ('1','2')),
        'priority_id' => $faker->randomElement($array = array ('1','2','3')),
        'is_complete' => $faker->randomElement($array = array ('0', '1'))
    ];
});
