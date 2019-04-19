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

