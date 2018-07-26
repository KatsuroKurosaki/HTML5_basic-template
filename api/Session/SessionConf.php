<?php
namespace Session;

class SessionConf {

	// Session configuration parameters for SessionDb class
	const SESSION_CONF = [
		"db"				=> "database",	// MySQL DB
		"dbtable"			=> "session",	// MySQL DB table
		"expires"			=> "1 DAY",		// How long will a session be valid
		"sidlen"			=> 16,			// Will produce 32 characters, change DB row length if this value is changed
		"debugexception"	=> false		// In case of an exception, we will use var_dump to show it
	];

	// Session initialization parameters
	const SESSION_OPTS = [
		"use_cookies"		=> 0,			// No use cookies
		"use_only_cookies"	=> 0,			// Idem
		"use_trans_sid"		=> 1,			// Custom $_GET parameter for session
		"name"				=> "s"			// Name of the $_GET parameter
	];
	
}

?>