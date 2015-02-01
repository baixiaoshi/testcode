<?php
	include "Image.class.php";

	$image = new Image();
	$result = $image->upload();
	var_dump($result);

?>