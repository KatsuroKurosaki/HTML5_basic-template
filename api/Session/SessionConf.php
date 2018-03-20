<?php
namespace Session;

class SessionConf {
	
	const SESSION_EXPIRE = "1 DAY";
	const SESSION_TABLE = "session";
	const SESSION_OPTS = ['use_cookies'=>0,'use_only_cookies'=>0,'use_trans_sid'=>1,'name'=>'s'];
	
}

?>