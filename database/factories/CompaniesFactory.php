<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'street_1' => $faker->streetAddress,
        'street_2' => $faker->optional()->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'phone_1' => $faker->phoneNumber,
        'phone_2' => $faker->optional()->phoneNumber,
        'fax' => $faker->optional()->phoneNumber,
        'email' => $faker->optional()->safeEmail,
        'logo' => $faker->imageUrl($width = 640, $height = 480),
        'incorp_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'corp_id' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'city_lic' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'county_lic' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'fed_tax_id' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'company_type_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
        'status_id' => $faker->randomElement($array = array ('1','2')),
    ];
});