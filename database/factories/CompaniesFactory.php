<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'street_1' => $faker->streetAddress,
        'street_2' => $faker->optional()->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'phone_1' => $faker->phoneNumber,
        'phone_2' => $faker->optional()->phoneNumber,
        'fax' => $faker->optional()->phoneNumber,
        'email' => $faker->optional()->safeEmail,
        'incorp_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'corp_id' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'city_lic' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'county_lic' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'fed_tax_id' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'company_type_id' => $faker->randomElement($array = array ('1','2')),
        'status_id' => $faker->randomElement($array = array ('1','2')),
    ];
});