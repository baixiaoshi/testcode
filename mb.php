<?php
	
	//header('Content-Type:text/html; charset=utf-8');
	$interenc = mb_internal_encoding();
	$str = '白小狮';
	file_put_contents("c:/log.txt",$str."\r\n",FILE_APPEND);
	echo $str;
	mb_convert_variables($interenc, 'UTF-8', &$str);
	file_put_contents("c:/log.txt",$str."\r\n",FILE_APPEND);
	call_user_func_array(function, param_arr)

?>