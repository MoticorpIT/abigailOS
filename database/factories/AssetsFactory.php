<?php

use Faker\Generator as Faker;

$factory->define(App\Asset::class, function (Faker $faker) {
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
		'email' => $faker->safeEmail,
		'rent' => $faker->numberBetween($min = 500, $max = 10000),
		'deposit' => $faker->numberBetween($min = 250, $max = 20000),
		'asset_type_id' => $faker->randomElement($array = array ('1','2','3')),
		'company_id' => $faker->randomElement($array = array ('1','2','3','4','5','6')),
		'status_id' => $faker->randomElement($array = array ('1','2')),
	];
});

