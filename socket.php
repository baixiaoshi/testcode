<?php
	header('Content-Type:text/html; charset=utf-8');
    set_time_limit(0);
	$host="www.tp.xx";
	$port=1000;
	//创建一个socket
	$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP)or die("cannot create socket\n");
	$conn=socket_connect($socket,$host,$port) or die("cannot connect server\n");
	
	socket_write($socket,"hurong") or die("cannot write data\n");
	$buffer=socket_read($socket,1024,PHP_NORMAL_READ);
	if($buffer){
		echo "response was:".$buffer."\n";
	}			
	socket_close($socket);
?>