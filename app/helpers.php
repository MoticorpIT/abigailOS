<?php

// FORMAT PHONE NUMBERS
if (! function_exists('cleanPhone')) {
    function cleanPhone($phoneNumber) {
    	$rinsedNumber = ltrim($phoneNumber, "+1 ");
    	if(strlen($rinsedNumber) < 15) {
			return preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4})(?:[ \D#\-]*(\d{3,6}))?.*~', '($1) $2-$3', $rinsedNumber). "\n";
		} elseif (strlen($rinsedNumber) > 14) {
			return preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4})(?:[ \D#\-]*(\d{3,6}))?.*~', '($1) $2-$3 x$4', $rinsedNumber). "\n";
		}
    }
}

// FORMAT PHONE FOR 'CLICK-TO-CALL'
if (! function_exists('clickablePhone')) {
	function clickablePhone($phoneNumber) {
		// Maybe able to remove once using real data.
		// Factory data has nums with and without country codes.
		// This removes that if it is there.
		$dirtyNumber = ltrim($phoneNumber, "+1 "); // remove +1

		$cleanedNumber = preg_replace("/[^0-9]/", "", $dirtyNumber ); // strip all non digits
		$cleanedNumber = '+1' . $cleanedNumber; // add +1
		return substr($cleanedNumber, 0, 12); // remove extension
	}
}

// FORMAT DOLLAR AMOUNTS
if (! function_exists('cleanMoney')) {
    function cleanMoney($amount) {
		return '$' . number_format($amount);
    }
}

// FORMAT DOLLAR AMOUNTS WITH CENTS
if (! function_exists('cleanMoneyWithCents')) {
    function cleanMoneyWithCents($amount) {
		return '$' . number_format($amount, 2);
    }
}

// FORMAT DATES
if (! function_exists('cleanDate')) {
    function cleanDate($date) {
		return $date->format('m/d/Y');
    }
}

// FORMAT DATES w TIME
if (! function_exists('cleanDateWithTime')) {
    function cleanDateWithTime($date) {
    	return $date->format('m/d/Y h:i a');
    }
}

// FORMAT DATES - SPECIAL USE CASE
// Used for proper formatting in datepicker on .edit pages
if (! function_exists('cleanDatePicker')) {
    function cleanDatePicker($date) {
		return $date->format('Y-m-d');
    }
}

