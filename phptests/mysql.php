<?php
$out = [];
$conn = @new MySQLi("127.0.0.1", "root", "", "information_schema");
if ($conn->connect_errno) {die($conn->connect_error);}

$sql = "SELECT table_schema AS 'DB Name', ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS 'DB Size in MB' FROM information_schema.tables WHERE table_schema = ? GROUP BY table_schema;";
$stmt = $conn->prepare($sql);
if ($stmt === false) {die($conn->error);}
$stmt->bind_param('s', $_POST['database']);
$stmt->execute();
if ($stmt->errno) {die($stmt->error);} // Return 1 error
// if($stmt->error){$out['status']="ko"; $out['msg']=$stmt->error_list; die(json_encode($out));} // Return all errors
$out['data'] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // Get all rows
if (count($out['data']) == 0) {} // Check if we have 0 rows
$out['data'] = $stmt->get_result()->fetch_assoc(); // Get 1 row because SQL query returned 1 row and we know it
if ($out['data'] == null) {} // Check if we have 0 rows
$insert_id = $stmt->insert_id; // Get inserted AUTO_INCREMENT
$stmt->affected_rows; // Get number of affected rows in INSERT, UPDATE or DELETE
$stmt->close();

$conn->close();
