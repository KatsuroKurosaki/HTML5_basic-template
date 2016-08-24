<?php
$start_time = microtime(TRUE);
ini_set('log_errors', true);
ini_set('error_log', dirname(__FILE__).'/errors.log');
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
			if($stmt->error){$out['status']="ko"; $out['msg']=$stmt->error; die(json_encode($out));}
			//if($stmt->error){$out['status']="ko"; $out['msg']=$stmt->error_list; die(json_encode($out));}
			$out['data'] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // Get all rows
			//$out['data'] = $stmt->get_result()->fetch_assoc(); // Get 1 row
			//$insert_id = $stmt->insert_id; // Get inserted AUTO_INCREMENT
			$stmt->close();
			$conn->close();
			
			$out['status']="ok";
		break;
		
		case 'curl':
			$url = "http://127.0.0.1/test.php";
			
			$curl=array();
			$curl['version'] = curl_version();
			$curl['curl'] = curl_init();
			curl_setopt_array($curl['curl'], array(
				CURLOPT_VERBOSE => true,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FAILONERROR => true,
				CURLOPT_URL => $url,
				CURLOPT_HEADER => true,
				CURLINFO_HEADER_OUT => true,
				CURLOPT_USERAGENT => "PHP/".PHP_VERSION." (".PHP_OS."; ".$curl['version']['host'].") cURL/".$curl['version']['version']." ".$curl['version']['ssl_version'],
				/*CURLOPT_PROXY => "127.0.0.1:9050",
				CURLOPT_PROXYTYPE => CURLPROXY_SOCKS5,*/
				/*CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json',
					'Authorization: Basic'
				),*/
				/*CURLOPT_CUSTOMREQUEST => "POST",*/
				/*CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => json_encode(array(
					'one' => 1,
					'two' => 2
				)),*/
				/*CURLOPT_SSL_VERIFYPEER => true,*/
				/*CURLOPT_COOKIEJAR => "cookies.txt",
				CURLOPT_COOKIEFILE => "cookies.txt",*/
				CURLOPT_TIMEOUT => 10
			));
			$curl['result'] = curl_exec($curl['curl']);

			if(curl_errno($curl['curl'])) {
				$out['status']="ko";
				$out['error'] = curl_error($curl['curl']);
			} else {
				$curl['info'] = curl_getinfo($curl['curl']);
				$curl['header'] = substr($curl['result'], 0, $curl['info']['header_size']);
				$curl['body'] = substr($curl['result'], $curl['info']['header_size']);
				$out['status']="ok";
			}
			curl_close($curl['curl']);
			unset($curl['curl']);
			$out['data']=$curl;
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
