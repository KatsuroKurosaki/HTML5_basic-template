<?php
$start_time = microtime(true);
require 'api_header.php';

$_in = (empty($_POST) && empty($_FILES)) ? json_decode(file_get_contents("php://input"), true) : $_POST;
$_out = \Utils\Functions::returnOut();

if ($_in !== null) {
	if (isset($_in['op'])) {
		switch ($_in['op']) {
			case 'HELLO':
				$_out = \Utils\Functions::returnOut([
					"msg" => "Hello World!",
					"color" => "success",
				]);
				break;

			case 'UPLOAD_FILE':
				if (!empty($_FILES)) {
					move_uploaded_file($_FILES['file']['tmp_name'], __DIR__ . '/upload/' . time() . '_' . $_FILES['file']['name']);
					$_out = \Utils\Functions::returnOut([
						"msg" => "File uploaded.",
					]);
				} else {
					$_out = \Utils\Functions::returnOut([
						"status" => "ko",
						"msg" => "No file received.",
						"color" => "warning",
					]);
				}
				break;

			default:
				$_out = \Utils\Functions::returnOut([
					"status" => "no",
					"msg" => "Received operation not found.",
					"color" => "warning",
					"code" => -1,
				]);
		}
	} else {
		$_out = \Utils\Functions::returnOut([
			"status" => "ko",
			"msg" => "NO operation received.",
			"color" => "danger",
			"code" => -1,
		]);
	}
} else {
	$_out = \Utils\Functions::returnOut([
		"status" => "ko",
		"msg" => "Input JSON is invalid.",
		"color" => "warning",
		"code" => -1,
	]);
}


$_out['mem']['engine_curr'] = memory_get_usage(false);
$_out['mem']['system_curr'] = memory_get_usage(true);
$_out['mem']['engine_peak'] = memory_get_peak_usage(false);
$_out['mem']['system_peak'] = memory_get_peak_usage(true);
$_out['time'] = round(microtime(true) - $start_time, 6);

echo json_encode($_out);
