<?php
if(version_compare(PHP_VERSION,'7.0.0','>=')){
	spl_autoload_register(function($classname){
		$file = __DIR__ . DIRECTORY_SEPARATOR . str_replace("\\",DIRECTORY_SEPARATOR,$classname) . ".php";
		if(file_exists($file) && is_readable($file)){
			require $file;
		}
		unset($file);
	},true,true);
}else{
	throw new \Exception("Minimum PHP required: >= 7.0.0");
}

/*set_error_handler(function($severity, $message, $filename, $lineno) {
	if (!error_reporting()) {
		return;
	}
	if (error_reporting() & $severity) {
		throw new ErrorException($message, 0, $severity, $filename, $lineno);
	}
});*/
?>