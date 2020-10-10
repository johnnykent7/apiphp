<?php
error_reporting(E_ALL);

date_default_timezone_set('Europe/Chisinau');

$key = "example_key";
$issued_at = time();
$expiration_time = $issued_at + (60 * 720); // valid for 12 hours
$issuer = "http://simplephpapi.test/";
?>
