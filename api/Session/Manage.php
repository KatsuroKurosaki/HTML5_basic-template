<?php
namespace Session;

class Manage {
	
	public static function start(){
		if (session_status() == PHP_SESSION_NONE) {
			session_set_save_handler(new SessionDb(SessionConf::SESSION_EXPIRE,SessionConf::SESSION_TABLE),true);
			session_start(SessionConf::SESSION_OPTS);
		}
	}
	
	public static function destroy(){
		if (session_status() != PHP_SESSION_NONE) {
			session_destroy();
		}
	}
	
}
?>