<?php
$start_time = microtime(TRUE);
header('Content-Type: application/json; charset=utf-8');
$out=array();
if(isset($_POST['op'])){
	switch($_POST['op']){
		case 'mysql':
			$conn = @new MySQLi("127.0.0.1","root","","information_schema");
			if ($conn->connect_errno) { $out['status']="ko"; $out['msg']=$conn->connect_error; die(json_encode($out)); }
			$sql = "SELECT table_schema AS 'DB Name', ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS 'DB Size in MB' FROM information_schema.tables WHERE table_schema = ? GROUP BY table_schema;";
			$stmt = $conn->prepare($sql);
			if($stmt === false){$out['status']="ko"; $out['msg']=$conn->error; die(json_encode($out));}
			$stmt->bind_param( 's',
				$_POST['database']
			);
			$stmt->execute();
			if($stmt === false){$out['status']="ko"; $out['msg']=$stmt->error; die(json_encode($out));}
			$out['data'] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			$stmt->close();
			$conn->close();
			
			$out['status']="ok";
		break;
		
		case 'hello':
			$out['data'] = "Hello World";
			$out['status']="ok";
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
