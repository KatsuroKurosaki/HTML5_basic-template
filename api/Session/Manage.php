<?php
namespace Session;

class Manage {
	
	public static function start($sessionConf=array()){
		if (session_status() == PHP_SESSION_NONE) {
			session_set_save_handler(new SessionDb($sessionConf),true);
			session_start(SessionConf::SESSION_OPTS);
		}
	}
	
	public static function destroy(){
		if (session_status() == PHP_SESSION_ACTIVE) {
			session_destroy();
		}
	}
	
	public static function check(){
		if(empty($_SESSION)){
			header("HTTP/1.1 401 Unauthorized");
			Manage::destroy();
			return false;
		}
		return true;
	}
	
}
?>