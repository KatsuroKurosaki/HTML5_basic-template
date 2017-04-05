<?php
$start_time = microtime(TRUE);
ini_set('log_errors', true);
ini_set('error_log', dirname(__FILE__).'/errors.log');
header('Content-Type: application/json; charset=utf-8');
$out=array();
if(isset($_POST['op'])){
	switch($_POST['op']){
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
			$out['msg']="Received operation is invalid.";
			$out['status']="no";
	}
} else {
	$out['status']="ko";
	$out['msg']="NO operation received.";
}
$out['mem']['usage'] = memory_get_usage(false);
$out['mem']['usagereal'] = memory_get_usage(true);
$out['mem']['peakusage'] = memory_get_peak_usage(false);
$out['mem']['peakusagereal'] = memory_get_peak_usage(true);
$out['time'] = round(microtime(TRUE)-$start_time,4);
echo json_encode($out);
?>
