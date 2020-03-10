<?php
header('Content-Type: application/json; charset=utf-8');
header("Cache-Control: no-cache");

ini_set('display_errors', false);
ini_set('log_errors', true);
ini_set('error_log', __DIR__ . '/errors.log');
error_reporting(-1);

require __DIR__ . '/class/autoload.php';

set_error_handler(function ($code, $string, $file, $line) {
	throw new \ErrorException($string, null, $code, $file, $line);
});
register_shutdown_function(function () {
	$error = error_get_last();
	if ($error !== null) {
		echo json_encode(\GlobalFunctions::returnOut([
			"status" => "ko",
			"msg" => $error['message'],
			"file" => $error['file'],
			"line" => $error['line'],
			"color" => "danger",
			"code" => -1,
		]));
	}
});
