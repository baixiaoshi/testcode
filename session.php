<?php
	
	require_once "Mysql.class.php";
	require_once "Session.class.php";
	$mysql = new Mysql();
	$session = new Session(&$msyql,'/tmp','PHPSESSID');

	//区别:

1,SESSION:存储在服务器端,   cookie:存储在客户端

2,两者都可通过时间来设置时间长短

3,cookie不安全,考虑安全性还是用session

4,session保存到服务器端,如果访问量过大,对服务器性能很影响,应使用memcache缓存session

5,单个COOKIE在客户端限制是3K,即存放的cookie不能超过3K,SESSION没有限制

#linux下一般放置session在/tmp/session-*
	
?>