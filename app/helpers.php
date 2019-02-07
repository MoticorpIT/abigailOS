<?php

// FORMAT PHONE NUMBERS
if (! function_exists('cleanPhone')) {
    function cleanPhone($phoneNumber) {
		
    	if(strlen($phoneNumber) < 15) {
			$phoneNumber = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4})(?:[ \D#\-]*(\d{3,6}))?.*~', '($1) $2-$3', $phoneNumber). "\n";
		} elseif(strlen($phoneNumber) > 14) {
			$phoneNumber = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4})(?:[ \D#\-]*(\d{3,6}))?.*~', '($1) $2-$3 x$4', $phoneNumber). "\n";
		}

		return $phoneNumber;

		// NO EXTENSION ----->		'~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4})(?:[ \D#\-]*(\d{3,6}))?.*~'
		// WITH EXTENSION ----->	'~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4})[^\d]{0,7}](\d{0,5}).*~'

    }
}

// FORMAT DOLLAR AMOUNTS
if (! function_exists('cleanMoney')) {
    function cleanMoney($amount) {

		$amount = '$' . number_format($amount);

		return $amount;

    }
}

// FORMAT DOLLAR AMOUNTS WITH CENTS
if (! function_exists('cleanMoneyWithCents')) {
    function cleanMoneyWithCents($amount) {

		$amount = '$' . number_format($amount, 2);

		return $amount;

    }
}

// FORMAT DATES
if (! function_exists('cleanDate')) {
    function cleanDate($date) {

		return $date->format('m/d/y');

    }
}

// FORMAT DATES w TIME
if (! function_exists('cleanDateWithTime')) {
    function cleanDateWithTime($date) {

    	return $date->format('m/d/y h:i a');

    }
}

