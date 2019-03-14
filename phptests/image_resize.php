<?php
function resizeImage($img_file, $filename, $ext = "jpg")
{
	$img_original = @imagecreatefromjpeg($img_file . "/" . $filename . "." . $ext);
	if (! $img_original) {
		$img_original = imagecreatefrompng($img_file . "/" . $filename . "." . $ext);
	}

	$max_width = 150;
	$max_height = 150;
	$quality = 95;

	list ($width, $height) = getimagesize($img_file . "/" . $filename . "." . $ext);

	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;

	if (($width <= $max_width) && ($height <= $max_height)) {
		$width_final = $width;
		$height_final = $height;
	} elseif (($x_ratio * $height) < $max_height) {
		$height_final = ceil($x_ratio * $height);
		$width_final = $max_width;
	} else {
		$width_final = ceil($y_ratio * $width);
		$height_final = $max_height;
	}

	$tmp = imagecreatetruecolor($width_final, $height_final);

	imagecopyresampled($tmp, $img_original, 0, 0, 0, 0, $width_final, $height_final, $width, $height);

	imagedestroy($img_original);

	imagejpeg($tmp, $img_file . "/" . $filename . "_t." . $ext, $quality);
}
