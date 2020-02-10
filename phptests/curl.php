<?php
$url = "http://127.0.0.1/test.php";

$curl = array();
$curl['info'] = curl_version();
$curl['curl'] = curl_init();
curl_setopt_array($curl['curl'], array(
	CURLOPT_VERBOSE => true,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FAILONERROR => true,
	CURLOPT_URL => $url,
	CURLOPT_HEADER => true,
	CURLINFO_HEADER_OUT => true,
	CURLOPT_USERAGENT => "PHP/" . PHP_VERSION . " (" . PHP_OS . "; " . $curl['info']['host'] . ") cURL/" . $curl['info']['version'] . " " . $curl['info']['ssl_version'],

	/*CURLOPT_PROXY => "127.0.0.1:9050",
	CURLOPT_PROXYTYPE => CURLPROXY_SOCKS5,*/

	/*CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic'
	),*/

	/*CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode(array(
    'one' => 1,
    'two' => 2
	)),*/

	/*CURLOPT_SSL_VERIFYPEER => true,*/

	/*CURLOPT_COOKIEJAR => "cookies.txt",
	CURLOPT_COOKIEFILE => "cookies.txt",*/

	CURLOPT_TIMEOUT => 10,
));
$curl['result'] = curl_exec($curl['curl']);

if (curl_errno($curl['curl'])) {
	echo curl_error($curl['curl']);
} else {
	$curl['reqinfo'] = curl_getinfo($curl['curl']);
	$curl['header'] = substr($curl['result'], 0, $curl['reqinfo']['header_size']);
	$curl['body'] = substr($curl['result'], $curl['reqinfo']['header_size']);
}
curl_close($curl['curl']);
unset($curl['curl']);

var_dump($curl);
