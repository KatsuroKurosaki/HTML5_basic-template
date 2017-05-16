<?php
/* SESSION */
require 'Conf.php';
require 'SessionDb.php';
session_start(['use_cookies'=>0,'use_only_cookies'=>0,'use_trans_sid'=>1,'name'=>'s']);
/* SESSION */


echo "<pre>"; print_r($_SESSION); echo "</pre>";

echo $_SESSION['hello'];

session_destroy();

?>