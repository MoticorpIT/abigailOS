<?php

if (! function_exists('cleanPhone')) {
    function cleanPhone($phoneNumber) {
		
    	if(strlen($phoneNumber) < 15) {
			$phoneNumber = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4})(?:[ \D#\-]*(\d{3,6}))?.*~', '($1) $2-$3', $phoneNumber). "\n";
		} elseif(strlen($phoneNumber) > 14) {
			$phoneNumber = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4})(?:[ \D#\-]*(\d{3,6}))?.*~', '($1) $2-$3 x$4', $phoneNumber). "\n";
		}

		return $phoneNumber;

    }
}

// NO EXTENSION ----->		'~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4})(?:[ \D#\-]*(\d{3,6}))?.*~'
// WITH EXTENSION ----->	'~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4})[^\d]{0,7}](\d{0,5}).*~'

