<?php
$start_time = microtime(TRUE);
ini_set('log_errors', true);
ini_set('error_log', __DIR__.'/errors.log');

header('Content-Type: application/json; charset=utf-8');

require __DIR__.'/api/autoload.php';
/*session_set_save_handler(new \Session\SessionDb(\Session\GlobalConf::SESSION_EXPIRE,\Session\GlobalConf::SESSION_TABLE),true);
session_start(['use_cookies'=>0,'use_only_cookies'=>0,'use_trans_sid'=>1,'name'=>'s']);*/

$_in = json_decode(file_get_contents("php://input"),true);
$_out=array();

if(isset($_in['op'])){
	
	switch($_in['op']){
		case 'hello':
			$_out['msg']="Hello World!";
			
			$_out['status']="ok";
			$_out['color']="success";
		break;
		
		default:
			$_out['msg']="Received operation is invalid.";
			
			$_out['status']="no";
			$_out['color']="danger";
	}
	
} else {
	$_out['status']="ko";
	$_out['msg']="NO operation received.";
	$_out['color']="danger";
}

$_out['mem']['engine_curr'] = memory_get_usage(false);
$_out['mem']['system_curr'] = memory_get_usage(true);
$_out['mem']['engine_peak'] = memory_get_peak_usage(false);
$_out['mem']['system_peak'] = memory_get_peak_usage(true);
$_out['time'] = round(microtime(TRUE)-$start_time,4);
echo json_encode($_out);
?>
