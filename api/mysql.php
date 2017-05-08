<?php
$conn = @new MySQLi("127.0.0.1","root","","information_schema");
if ($conn->connect_errno){$out['status']="ko"; $out['msg']=$conn->connect_error; die(json_encode($out));}
$sql = "SELECT table_schema AS 'DB Name', ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS 'DB Size in MB' FROM information_schema.tables WHERE table_schema = ? GROUP BY table_schema;";
$stmt = $conn->prepare($sql);
if($stmt === false){$out['status']="ko"; $out['msg']=$conn->error; die(json_encode($out));}
$stmt->bind_param('s',
	$_POST['database']
);
$stmt->execute();
if($stmt->err_no){$out['status']="ko"; $out['msg']=$stmt->error; die(json_encode($out));} // Return 1 error
//if($stmt->error){$out['status']="ko"; $out['msg']=$stmt->error_list; die(json_encode($out));} // Return all errors
$out['data'] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // Get all rows
//if(count($out['data'])==0){} // Check if we have 0 rows
//$out['data'] = $stmt->get_result()->fetch_assoc(); // Get 1 row because SQL query returned 1 row and we know it
//if($out['data']==NULL){} // Check if we have 0 rows
//$insert_id = $stmt->insert_id; // Get inserted AUTO_INCREMENT
//$stmt->affected_rows // Get number of affected rows in INSERT, UPDATE or DELETE
$stmt->close();
$conn->close();

$out['status']="ok";
?>
