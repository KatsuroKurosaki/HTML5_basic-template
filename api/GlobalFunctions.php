<?php
class GlobalFunctions {
	
	public static function trimSeveral(string $str){
		return trim(preg_replace('/(?:\s\s+|\n|\t)/',' ',$str));
	}
	
	
}
?>