<?php
$start_time = microtime(TRUE);
ini_set('log_errors', true);
ini_set('error_log', __DIR__ . '/errors.log');

header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/api/autoload.php';

$_out = [];

if (! empty($_POST)) {
	if (isset($_POST['op'])) {
		switch ($_POST['op']) {
			case 'UPLOAD_FILE':
				if (!empty($_FILES)) {
					move_uploaded_file($_FILES['file']['tmp_name'], './upload/' . $_FILES['file']['name']);
					$_out = \GlobalFunctions::returnOut([
						"msg" => "File uploaded."
					]);
				} else {
					$_out = \GlobalFunctions::returnOut([
						"status" => "ko",
						"msg" => "No file received.",
						"color" => "warning"
					]);
				}
				break;

			default:
				$_out = \GlobalFunctions::returnOut([
					"status" => "no",
					"msg" => "Received operation is invalid.",
					"color" => "warning",
					"code" => - 1
				]);
		}
	} else {
		$_out = \GlobalFunctions::returnOut([
			"status" => "ko",
			"msg" => "NO operation received.",
			"color" => "danger",
			"code" => - 1
		]);
	}
} else {
	$_out = \GlobalFunctions::returnOut([
		"status" => "ko",
		"msg" => "Input form data is invalid.",
		"color" => "warning",
		"code" => - 1
	]);
}

if (\GlobalConf::API_DEBUG) {
	$_out['mem']['engine_curr'] = memory_get_usage(false);
	$_out['mem']['system_curr'] = memory_get_usage(true);
	$_out['mem']['engine_peak'] = memory_get_peak_usage(false);
	$_out['mem']['system_peak'] = memory_get_peak_usage(true);
	$_out['time'] = round(microtime(TRUE) - $start_time, 6);
}
echo json_encode($_out);
