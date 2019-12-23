<?php
require __DIR__ . "/../class/autoload.php";

foreach (\Cli\Colors::getForegroundColors() as $k => $v) {
	echo \Cli\Colors::colorStr('Hello World ' . $v, $v) . "\n";
}

foreach (\Cli\Colors::getBackgroundColors() as $k => $v) {
	echo \Cli\Colors::colorStr('Hello World ' . $v, null, $v) . "\n";
}
