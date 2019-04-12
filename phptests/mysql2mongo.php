<?php

// Number of read rows for bulk insert
$_bulkread = 100000;

// MySQL config
$_mysql = [
	"host" => "127.0.0.1:3306",
	"user" => "root",
	"pass" => "",
	"ddbb" => "database"
];

// MongoDB config
$_mongodb = [
	"host" => "127.0.0.1:27017",
	"user" => "",
	"pass" => "",
	"ddbb" => "database"
];


/************************************/


// MySQL
$conn = @new MySQLi($_mysql['host'], $_mysql['user'], $_mysql['pass'], $_mysql['ddbb']);
if ($conn->connect_errno) { die($conn->connect_error); }

// MongoDB
$manager = new MongoDB\Driver\Manager(
	"mongodb://".$_mongodb['host'],
	[ "username" => $_mongodb['user'], "password" => $_mongodb['pass'] ]
);

// Current table read
$stmt = $conn->prepare("SHOW TABLES;");
if ($stmt === false) { die($conn->error); }
$stmt->execute();
if ($stmt->errno) { die($stmt->error); }
$mysql_tables = $stmt->get_result()->fetch_all(MYSQLI_NUM);
$stmt->close();

foreach($mysql_tables as $k=>$v){
	echo "Migrating ".$v[0]."\n";
	
	$begin_row = 0;
	do {
		
		$stmt = $conn->prepare("SELECT * FROM ".$v[0]." LIMIT ".$begin_row.",".$_bulkread.";");
		if ($stmt === false) { die($conn->error); }
		$stmt->execute();
		if ($stmt->errno) { die($stmt->error); }
		$data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		$stmt->close();
		
		echo "- Read ".count($data)." rows.\n";
		
		if(count($data)){
			$bulk = new MongoDB\Driver\BulkWrite;
			foreach($data as $k2=>$v2){
				$bulk->insert($v2);
			}
			$manager->executeBulkWrite($_mongodb['ddbb'].'.'.$v[0], $bulk);
			echo "- Insert OK on ".$v[0].", total so far ".($begin_row+$bulk->count()).".\n";
			unset($bulk);
		}
		$begin_row += $_bulkread;
	} while( count($data) );
	
}

// End
$conn->close();
unset($manager);
