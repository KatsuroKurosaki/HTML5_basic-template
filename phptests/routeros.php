<?php
require __DIR__ . "/routeros_api.class.php";

$mktapi = new RouterosAPI();
$mktapi->debug = true;
$mktapi->port = 8728;
$mktapi->ssl = true;
if ($mktapi->connect("192.168.144.120", "admin", "admin")) {

	$response = $mktapi->comm('/interface/print');

	// $mktapi->write('/interface/print');
	// $response = $mktapi->read(false);
	// $data = $mktapi->parseResponse($response);

	print_r($response);

	$mktapi->disconnect();
}
