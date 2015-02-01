<?php

	header('Content-Type:text/html; charset=utf-8');
	$search = array('email','password','client_account','client_password','login_url','usernaem','interview');
	$replace = array(
		'email'	=>	'893472394@qq.com',
		'password'	=>	'123456',
		'client_account'	=>	'myaccountname',
		'client_password'	=>	'mypassword',
		'login_url'	=>	'http://www.zmlearn.com',
		'username'	=>	'fanfan',
		'interview'	=>	'interviewtime'
		);

	$template = '你的邮件<{$email}>,你的网站密码<{password}>,客户端帐号<{client_account}>,客户端密码<{client_password}>,首次登入url:<{login_url}>,预约时间<{interview}>';

	function replace_mail_template($search,$replace,$template)
	{
		if(!is_array($search) || !is_array($replace)) return false;

		for($i=0,$len=count($search);$i<$len;$i++)
		{
			if(strpos($template, $search[$i]) !== false)
			
				$template = str_replace('<{'.$search[$i].'}>', $replace[$search[$i]], $template);
	
		}
		return $template;
	}
	

	echo replace_mail_template($search,$replace,$template);
?>