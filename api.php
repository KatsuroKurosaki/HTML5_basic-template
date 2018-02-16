<?php
$start_time = microtime(TRUE);
ini_set('log_errors', true);
ini_set('error_log', __DIR__.'/errors.log');

header('Content-Type: application/json; charset=utf-8');

//if(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']==='on'){
	require __DIR__.'/api/autoload.php';
	
	$_in = json_decode(file_get_contents("php://input"),true);
	$_out=array();

	if($_in!==null){
		if(isset($_in['op'])){
			switch($_in['op']){
				case 'hello':
					$_out['status']="ok";
					$_out['msg']="Hello World!";
					$_out['color']="success";
				break;
				
				default:
					$_out['status']="no";
					$_out['msg']="Received operation is invalid.";
					$_out['color']="danger";
			}
			
		} else {
			$_out['status']="ko";
			$_out['msg']="NO operation received.";
			$_out['color']="danger";
		}
	} else {
		$_out['status']="ko";
		$_out['msg']="Input JSON invalid.";
		$_out['color']="danger";
	}
/*} else {
	$_out['status']="ko";
	$_out['msg']="Request not performed over HTTPS.";
	$_out['color']="danger";
}*/

$_out['mem']['engine_curr'] = memory_get_usage(false);
$_out['mem']['system_curr'] = memory_get_usage(true);
$_out['mem']['engine_peak'] = memory_get_peak_usage(false);
$_out['mem']['system_peak'] = memory_get_peak_usage(true);
$_out['time'] = round(microtime(TRUE)-$start_time,6);
echo json_encode($_out);
?>
