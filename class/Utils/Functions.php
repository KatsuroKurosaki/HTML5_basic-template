<?php

namespace Utils;

class Functions
{
	public static function returnOut($options = [])
	{
		$_settings = array_replace_recursive([
			'status' => 'ok',
			'msg' => '',
			'color' => 'info',
			'code' => 0,
		], $options);

		return $_settings;
	}

	public static function trimSeveral(string $str)
	{
		return trim(preg_replace('/(?:\s\s+|\n|\t)/', ' ', $str));
	}
}
