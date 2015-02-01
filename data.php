<?php
	header("Content-Type:text/html;charset=utf-8");
	$url = 'http://xuexiao.eol.cn/?cengci=%E9%AB%98%E4%B8%AD_cengci&local1=%E5%8C%97%E4%BA%AC_local1';
		$curl = curl_init(); //启动一个curl会话
        curl_setopt($curl, CURLOPT_URL, $url); //要访问的地址
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); //使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); //自动设置Referer
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); //设置超时限制防止死循环
       
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //获取的信息以文件流的形式返回
        $result = curl_exec($curl); //执行一个curl会话
        //file_put_contents("d:/log.html",$result."\r\n",FILE_APPEND);
        preg_match_all('/<li><a href=\".*\">(.*)<\/a><\/li>/i', $result, $matches);
        echo '<pre>';
        	print_r($matches);
        echo '</pre>';
        curl_close($curl); //关闭curl


?>