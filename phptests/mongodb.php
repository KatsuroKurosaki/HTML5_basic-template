<pre><?php

// Connect
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Insert
$bulk = new MongoDB\Driver\BulkWrite();
$bulk->insert([
	'x' => random_int(0, 999999999)
]);
$bulk->insert([
	'x' => random_int(0, 999999999)
]);
$bulk->insert([
	'x' => random_int(0, 999999999)
]);
$manager->executeBulkWrite('hello_db.hello_collection', $bulk);

// Select
$query = new MongoDB\Driver\Query([]);
$cursor = $manager->executeQuery('hello_db.hello_collection', $query);

foreach ($cursor as $document) {
	var_dump((array) $document);
}
unset($query, $cursor);

// Select with filters
$query = new MongoDB\Driver\Query([
	'x' => [
		'$gt' => 779695397
	]
]);
$cursor = $manager->executeQuery('hello_db.hello_collection', $query);

foreach ($cursor as $document) {
	var_dump((array) $document);
}
unset($query, $cursor);

// Select with filters and timeout
$query = new MongoDB\Driver\Query([
	// 'name' => ['$regex' => 'Joa']
	'name' => new MongoDB\BSON\Regex('Joa')
], [
	'maxTimeMS' => 1000
]);
$cursor = $manager->executeQuery('hello_db.hello_collection', $query);

foreach ($cursor as $document) {
	var_dump((array) $document);
}
unset($query, $cursor);

// Disconnect?
unset($manager);

?></pre>