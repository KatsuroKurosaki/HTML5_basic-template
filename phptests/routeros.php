<?php
require __DIR__ . "/../class/autoload.php";

$mktapi = new \RouterosAPI();
$mktapi->debug = true;
$mktapi->ssl = true;
$mktapi->port = 8728;
$mktapi->attempts = 1;
$mktapi->delay = 0;
$mktapi->timeout = 9;

if ($mktapi->connect('192.168.144.120', 'admin', 'admin')) {

	// Read
	$comm = $mikrotik->comm(
		'"/system/resource/print'
	);
	print_r($comm);

	// Write
	$comm = $mikrotik->comm(
		'/system/package/update/set',
		array(
			'channel' => 'long-term'
		)
	);
	print_r($comm);
}
$mktapi->disconnect();
