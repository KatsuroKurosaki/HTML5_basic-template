<?php
/* SESSION */
require 'Conf.php';
require 'SessionDb.php';
session_start(['use_cookies'=>0,'use_only_cookies'=>0,'use_trans_sid'=>1,'name'=>'s']);
/* SESSION */


$_SESSION['hello'] = "World";

echo $_SESSION['hello'];

?>