<?php

	/*header("Content-Type:text/html; charset=gbk");
	$tags = get_meta_tags('http://www.lingzhong.cn/tech/18151.htm');
	
	echo '<pre>';
		print_r($tags);
	echo '</pre>';*/

	/*$html = file_get_contents('http://www.mmduo.cc');
	$doc = new DOMDocument();
	$doc->loadHTML($html);
	$xpath = new DOMXPath($doc);
	$nodes = $xpath->query('//head/meta');
	var_dump($nodes);*/
	/*$parmArr = array(
		'hello'	=>	'world',
		'name'	=>	'baixiaoshi',
		'age'	=>	23
		);
	$queryStr = http_build_query($parmArr);
	parse_str($queryStr,$parmArr);
	echo '<pre>';
		print_r($parmArr);
	echo '</pre>';*/
	/*$cookie = http_parse_cookie('RMID=2dab5fc9296749c2f28ec0b7; expires=Saturday, 20-Mar-2010 01:34:06 GMT; path=/; domain=.example.com'); 
	echo '<pre>';
		print_r($cookie);
	echo '</pre>';*/
	//$str = "www.baidu.com";
	//$strarr = str_split($str);
	//echo join(',',$strarr);
	//echo implode('', $strarr);
	//substr($str,$start,$len);
	/*header("Content-Type:text/html; charset=utf-8");
	$str = '中国你好';*/
	//echo substr($str,1,3);
	//echo mb_substr($str,0,4);//可以截取中文
	//echo mb_strcut($str, 0,2);
	//mb_strcut($str, $start);
	/*echo mb_strlen($str);
	echo strlen($str);
	phpinfo();*/
	//$url = 'http://www.test.com.cn/abc/de/fg.php';
	//$arr = pathinfo($url,PHP_EXTENSION);
	//$path = parse_url($url,PHP_URL_PATH);
	//$arr = pathinfo($path);
	//echo basename($path);
	//echo $arr['extension'];
	$num = '1234567890.00';
	//echo number_format($num);

	//$rstr = preg_replace('/(?<=[0-9])(?=[0-9]{3}+)\./i', ',', $num);
	//echo $rstr;
	//$arr = str_split(strrev(strstr($num, '.',true)),3);
	//echo strrev(implode(',',$arr));
	//其实后面有小数点也无所谓的啦的啦的啦
/*
	12、服务器在运行的过程中，随着用户访问数量的增长，如何通过优化，保证性能？如果数据库已经达到最优化，请设计出继续升级的解决方案

squid->lvs|集群->shpinx|memcache->php静态化(缓存)->分区|主从|一主多从(读写分离)

首先可以通过

分库分表缓解一些负担，

应用缓存服务器，如MemCache服务器，

增加主从服务器和负载均衡服务器提高网站读取速度，

添加静态资源服务器，存放一些静态资源，如CSS,Js,图片等，

提高检索速度可以架设内容检索服务器如Shpinx，Xapian，

消息队列服务器，架设数据库集群，

也可以考虑NoSQL，如谷歌的BigTable,DB连接池，使数据库读写分离*/


	/*13、写出程序运行的结果



       $a=0;

       $b=0;

       If($a=3 || $b=3){

              $a++;

              $b++;

}

Echo $a.”,”.$b;


 



       $a=0;

       $b=0;

       If($a=4 | $b=3){

              $a++;

              $b++;

}

Echo $a.”,”.$b;



 

100 011

 结果：

       1.1

       8.4*/


//1.增，删，改，查,类型转换,属性，格式化
  

?>
