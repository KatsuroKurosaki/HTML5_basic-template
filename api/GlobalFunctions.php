<?php
class GlobalFunctions {
	
	public static function newTrim(string $str){
		return trim(preg_replace('/(?:\s\s+|\n|\t)/',' ',$str));
	}
	
	
}
?>