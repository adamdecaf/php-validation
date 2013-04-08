<?php
/**
 * Simple PHP Validation Class Test Script
 * Adam Shannon
 * Decaf Productions License
 * <http://decafproductions.com/license.php>
 * 08/12/2009
 */

// Load the class
require "validate.class.php";
$string_class = new validation_class;
$limits = array(3, 20);
$different_limits = array(1, 30);

	// Now check some strings...
	$strings = array(
		0 => 'abcdef',
		1 => '123456',
		2 => 'abCdEf',
		3 => 'a1cde4',
		4 => 'A1cD3f',
		5 => '1ab#$c',
		6 => 'ab-d0F',
		7 => '#@*&$#',
		8 => 'a',
		9 => 'abc',
		10 => 'abcdefghijklmnopqrstuvwxyz',
		11 => 'user@domain.tld',
		12 => 'first.last@domain.tld',
		13 => 'first.middle.last@domain.tld',
		14 => 'first.middle.last@sub.domain.tld',
		15 => '127.0.0.1',
		16 => '127.000.000.00001',
		17 => 'http://domain.tld',
		18 => 'http://sub.domain.tld',
		19 => 'https://domain.tld',
		20 => 'https://sub.domain.tld',
		21 => 'http://sub.domain.tld/pa-th/t_o/fo-ld-er',
		22 => 'http://sub.domain.tld/pa-th/t_o/fo-ld-er/'
	);

// Design it a bit
echo '<h2 style="margin-bottom:5px;">Validation Tests</h2>';
echo '$limits = array(' , $limits[0] , ', ' , $limits[1] , ');<br />';
echo '$different_limits = array(' , $different_limits[0] , ', ' , $different_limits[1] , ');<br />';
echo 'Symbols: ' , $string_class->allowed_symbols , '<br />';

	// Start the table
	echo '<table cellpadding="5"><tr>';
		echo '<td><strong>String</strong></td>';
		
		echo '<td><strong>Alpha</strong></td>';
		echo '<td><strong>Numeric</strong></td>';
		echo '<td><strong>Alpha-Numeric</strong></td>';
		echo '<td><strong>Different Length(s)</strong></td>';
		
		echo '<td><strong>Symbols</strong></td>';
		echo '<td><strong>Alpha Symbols</strong></td>';
		echo '<td><strong>Numeric Symbols</strong></td>';
		echo '<td><strong>Alpha Numeric<br />Symbols</strong></td>';
		echo '<td><strong>Alpha Numeric<br />Symbols (Diff Limits)</strong></td>';
		
		echo '<td><strong>Email</strong></td>';
		echo '<td><strong>IP</strong></td>';
		echo '<td><strong>URL</strong></td>';
	echo '</tr>';
	
		// Check each string
		foreach ($strings as $str) {
			// Check each test
			echo '<tr>';
				echo '<td>' , $str , '</td>';
				echo '<td>' , $string_class->alpha($str, $limits) , '</td>';
				echo '<td>' , $string_class->numeric($str, $limits) , '</td>';
				echo '<td>' , $string_class->alpha_numeric($str, $limits) , '</td>';
				echo '<td>' , $string_class->alpha_numeric($str, $different_limits) , '</td>';
				
				echo '<td>' , $string_class->symbols($str, $limits) , '</td>';
				echo '<td>' , $string_class->alpha_symbols($str, $limits) , '</td>';
				echo '<td>' , $string_class->numeric_symbols($str, $limits) , '</td>';
				echo '<td>' , $string_class->alpha_numeric_symbols($str, $limits) , '</td>';
				echo '<td>' , $string_class->alpha_numeric_symbols($str, $different_limits) , '</td>';
				
				echo '<td>' , $string_class->email($str, $limits) , '</td>';
				echo '<td>' , $string_class->ip($str, $limits) , '</td>';
				echo '<td>' , $string_class->url($str, $limits) , '</td>';
			echo '</tr>';
		}

	// End the table
	echo '</table>';
?>