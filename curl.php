<?php
	header('Content-Type:text/html; charset=utf-8');
	//模拟微信登入
	$cookie_file = tempnam('./temp','cookie');
	$login_url = 'https://mp.weixin.qq.com/cgi-bin/login';
	$data = 'f=json&imgcode=&pwd=92016dfee1f551a11764da38a30bdd3d&username=nongdatekan@163.com';
	$ch = curl_init($login_url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch,CURLOPT_COOKIEJAR,$cookie_file);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_REFERER,'https://mp.weixin.qq.com');
	curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
	$content = curl_exec($ch);
	//var_dump($content);
	curl_close($ch);
	$newurl = json_decode($content,1);
	$newurl = $newurl['redirect_url'];
	$arr = explode('token=', $newurl);
	$token = $arr[1];
	//用户列表页面
	$go_url = "https://mp.weixin.qq.com/cgi-bin/contactmanage?t=user/index&pagesize=10&pageidx=0&type=0&token=".$token."&lang=zh_CN";
	$ch = curl_init($go_url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_COOKIEFILE,$cookie_file);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$content = curl_exec($ch);
	preg_match('/friendsList\s?:\s?\((.*)\)\.contacts/i',$content,$match);
	$matcharr = json_decode($match[1],true);

	$target_info = $matcharr['contacts'];
	
	curl_close($ch);
	
	//核对刚刚发来的信息是否相同,相同或去openid，这时成功的将fakeid与openid成功绑定

	foreach($target_info as $k=>$v)
	{
		$go_url = "https://mp.weixin.qq.com/cgi-bin/singlesendpage?t=message/send&action=index&tofakeid=".$v['id']."&token=".$token."&lang=zh_CN";
		
		$ch = curl_init($go_url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_COOKIEFILE,$cookie_file);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$content = curl_exec($ch);

		preg_match('/\"msg_items\":(.*\}\}\]\})/i',$content,$match);
		$info = json_decode($match[1],true);
		/*ob_start();
		echo '<pre>';
			print_r($info);
		echo '</pre>';
		 $a= ob_get_contents();
		ob_end_clean();
		file_put_contents("c:/log001.txt",$a."\r\n",FILE_APPEND);*/
		$chinfo = $info['msg_item'][0]['content'];
		preg_match('/sandongid=(.*)=sandong/i',$chinfo,$match2);
		$infofakeid = $info['msg_item'][0]['fakeid'];
		//这里插入相对应的数据库
		
		curl_close($ch);
	}
		
	
?>