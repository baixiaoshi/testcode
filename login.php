<?php
	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$sql = "select name,pwd from user where name='".$username."' and pwd='".md5($password)."'";
	echo $sql;
	$conn = mysql_connect('localhost','root','root') or die('connect faile');
	mysql_select_db('test');
	$res = mysql_query($sql);
	while($row = mysql_fetch_row($res))
	{
		var_dump($row);
	}
?>
