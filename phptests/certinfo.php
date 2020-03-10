<?php
require __DIR__ . '/../class/autoload.php';

$url = "https://127.0.0.1";

$curl = new \Network\Curl($url);
$curl->setParam(CURLOPT_CERTINFO, true);
$curl->execute();
$certs = array();
foreach ($curl->getInfo()['certinfo'] as $k => $v) {
	$cert = openssl_x509_parse($v['Cert'], true);
	array_push($certs, round(($cert['validTo_time_t'] - time()) / 86400, 2));
}
unset($curl);

echo min($certs);
