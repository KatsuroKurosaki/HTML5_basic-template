<?php
echo '<pre>';
require '../api/autoload.php';
//print_r($_SERVER);
$data = [];
try {
    $data = \Db\db_name\DbConnection::execute("SELECT * FROM user;")->getData();
} catch (\Exception $e) {
    echo $e->getMessage();
    echo '<br/>';
    echo $e->getTraceAsString();
    var_dump($e);
}
print_r($data);
echo '</pre>';
?>