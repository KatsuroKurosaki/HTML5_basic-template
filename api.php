<?php
$start_time = microtime(TRUE);
ini_set('log_errors', true);
ini_set('error_log', dirname(__FILE__).'/errors.log');

$_in = json_decode(file_get_contents("php://input"),true);
$_out=array();

if(isset($_in['op'])){
	switch($_in['op']){
		case 'mysql':
			require './api/mysql.php';
		break;
		
		case 'curl':
			require './api/curl.php';
		break;
		
		case 'hello':
			require './api/hello.php';
		break;
		
		default:
			$_out['msg']="Received operation is invalid.";
			$_out['status']="no";
	}
} else {
	$_out['status']="ko";
	$_out['msg']="NO operation received.";
}

header('Content-Type: application/json; charset=utf-8');
$_out['mem']['engine_curr'] = memory_get_usage(false);
$_out['mem']['system_curr'] = memory_get_usage(true);
$_out['mem']['engine_peak'] = memory_get_peak_usage(false);
$_out['mem']['system_peak'] = memory_get_peak_usage(true);
$_out['time'] = round(microtime(TRUE)-$start_time,4);
echo json_encode($_out);
?>
