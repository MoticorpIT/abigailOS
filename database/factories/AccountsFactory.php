<?php

use Faker\Generator as Faker;

$factory->define(App\Account::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
		'acct_num' => $faker->numberBetween($min = 10000000, $max = 9999999999999999),
		'url' => $faker->url,
		'street_1' => $faker->streetAddress,
		'street_2' => $faker->optional()->secondaryAddress,
		'city' => $faker->city,
		'state' => $faker->stateAbbr,
		'zip' => $faker->postcode,
		'phone_1' => $faker->phoneNumber,
		'phone_2' => $faker->optional()->phoneNumber,
		'fax' => $faker->optional()->phoneNumber,
		'email' => $faker->unique()->safeEmail,
		'contact_name' => $faker->optional()->name,
		'contact_phone_1' => $faker->optional()->phoneNumber,
		'contact_phone_2' => $faker->optional()->phoneNumber,
		'contact_email' => $faker->optional()->safeEmail,
		'account_type_id' => $faker->randomElement($array = array ('1','2','3','4')),
		'company_id' => $faker->numberBetween($min = 1, $max = 20),
		'asset_id' => $faker->numberBetween($min = 1, $max = 20),
		'status_id' => $faker->randomElement($array = array ('1','2')),
    ];
});


