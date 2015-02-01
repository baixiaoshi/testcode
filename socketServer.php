<?php
	header('Content-Type:text/html; charset=utf-8');
    set_time_limit(0);
	$host="www.tp.xx";
	$port=1000;
	//创建一个连接
	$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP)or die("cannot create socket\n");
	//绑定socket到端口
	$result=socket_bind($socket,$host,$port) or die("cannot bind port to socket\n");
	//开始监听这个端口
	$result=socket_listen($socket,4) or die("could not set up socket listen\n");
	//接受连接，另一个socket来处理通信
	$msgsock=socket_accept($socket) or die("cannot accept incoming connection\n");
	if($msgsock){
		echo "有客户端来请求了".date("Y-m-d H:i:s");
	}
	//读取客户端发送过来的信息
	$input=socket_read($msgsock,1024) or die("cannot read input\n");
	$input=trim($input);
	$output=strtoupper($input)."\n";
	//对接收到的信息进行处理，然后返回到客户端
	socket_write($msgsock,$output,strlen($output)) or die("cannot write");
	//关闭socket连接
	socket_close($msgsock);
	socket_close($socket);

?>