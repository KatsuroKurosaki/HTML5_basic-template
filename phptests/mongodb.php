<?php
// Connection details
$_mongodb = [
    "host" => "127.0.0.1:27017",
    "user" => "",
    "pass" => "",
    "ddbb" => "database",
    "auth" => "admin",
];

// Connect
$manager = new MongoDB\Driver\Manager(
    "mongodb://" . $_mongodb['host'] . "/" . $_mongodb['auth'],
    [
        "username" => $_mongodb['user'],
        "password" => $_mongodb['pass'],
        "connectTimeoutMS" => 3000,
    ]
);

// Insert
$bulk = new MongoDB\Driver\BulkWrite();
$bulk->insert([
    'x' => random_int(0, 999999999),
]);
$bulk->insert([
    'x' => random_int(0, 999999999),
]);
$bulk->insert([
    'x' => random_int(0, 999999999),
]);
$manager->executeBulkWrite($_mongodb['ddbb'] . '.hello_collection', $bulk);

// Select
$query = new MongoDB\Driver\Query([]);
$cursor = $manager->executeQuery($_mongodb['ddbb'] . '.hello_collection', $query);

foreach ($cursor as $document) {
    var_dump((array) $document);
}
unset($query, $cursor);

// Select with filters
$query = new MongoDB\Driver\Query([
    'x' => [
        '$gt' => 779695397,
    ],
]);
$cursor = $manager->executeQuery($_mongodb['ddbb'] . '.hello_collection', $query);

foreach ($cursor as $document) {
    var_dump((array) $document);
}
unset($query, $cursor);

// Select with filters and timeout
$query = new MongoDB\Driver\Query([
    // 'name' => ['$regex' => 'Joa']
    'name' => new MongoDB\BSON\Regex('Joa'),
], [
    'maxTimeMS' => 1000,
]);
$cursor = $manager->executeQuery($_mongodb['ddbb'] . '.hello_collection', $query);

foreach ($cursor as $document) {
    var_dump((array) $document);
}
unset($query, $cursor);

// Disconnect?
unset($manager);
