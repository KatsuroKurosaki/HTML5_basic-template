<?php
namespace Session;

class SessionConf {
	
	// Will produce 32 characters, change DB row length if this value is changed
	const SESSION_BYTESLEN = 16;
	// How long will a session be valid
	const SESSION_EXPIRE = "1 DAY";
	// MySQL DB table
	const SESSION_TABLE = "session";
	// Session initialization parameters
	const SESSION_OPTS = [
		"use_cookies"		=> 0,
		"use_only_cookies"	=> 0,
		"use_trans_sid"		=> 1,
		"name"				=> "s",
		"url_rewriter.tags"	=> ""
	];
	
}

?>