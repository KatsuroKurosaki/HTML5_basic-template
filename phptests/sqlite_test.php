<?php

// $valor=3;
$db = new SQLite3(__DIR__ . "/test.db");

// $sql = "SELECT id, code FROM asdf WHERE id=?;";
$sql = "SELECT id, code FROM asdf;";
$stmt = $db->prepare($sql);
// $stmt->bindValue(1,$valor,SQLITE3_INTEGER); // SQLITE3_INTEGER SQLITE3_FLOAT SQLITE3_TEXT SQLITE3_BLOB SQLITE3_NULL
$result = $stmt->execute();
$data = array();
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
	$data[] = $row;
}
$stmt->close();

echo "<pre>";
print_r($data);
echo "</pre>";

/*
 * $nuevovalor = "BLUE";
 * $sql = "INSERT INTO asdf (code) VALUES (?);";
 * $stmt = $db->prepare($sql);
 * $stmt->bindValue(1,$nuevovalor,SQLITE3_TEXT); // SQLITE3_INTEGER SQLITE3_FLOAT SQLITE3_TEXT SQLITE3_BLOB SQLITE3_NULL
 * $stmt->execute();
 * echo "row id ".$db->lastInsertRowID();
 * $stmt->close();
 */

$db->close();
