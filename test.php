<?php
	//*************************************************************//
	//$money = '1234567891.00';
	//$num = preg_replace('/(?<=[0-9])(?=(?:[0-9]{3})+(?![0-9]))/')
	//$num = preg_replace('/.*(?=(?:[0-9]{3}))+\.)+/',',',$money);
	//echo $num;
	
/*	$data = array('a','b','c');
	foreach($data as $key=>$val)
	{	
		$val = &$data[$key];
		//var_dump($data);
	}

	$val ->$data[0]->a
	$val->b  $data[0]->b
	$val->$data[1]->b
	$val->c $data[1]->c
	$val->$data[2]->c*/

	/*function &test()
	{
		return 10;
	}
	$str = 'hello';
	echo count($str);
	echo '<br>';
	echo strlen($str);

	class Demo
	{
			private $name = 'baixiaoshi';
			private $age = 23;
			private $hobby = 'runing';
			public  $hello = 'world';

			public function subject()
			{
				echo 'this is method subject';
			}
	}
	echo '<br>';
	$demoObj = new Demo();
	echo count($demoObj);	*/
	//header('Content-Type:text/html;charset=utf-8');


/*	$url = 'http://xuexiao.eol.cn/?cengci=%E9%AB%98%E4%B8%AD_cengci&local1=%E5%8C%97%E4%BA%AC_local1';
		$curl = curl_init(); //启动一个curl会话
        curl_setopt($curl, CURLOPT_URL, $url); //要访问的地址
       // curl_setopt($curl, CURLOPT_HTTPHEADER, $header); //设置HTTP头字段的数组
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查
        //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); //从证书中检查SSL加密算法是否存在
        //curl_setopt($curl, CURLOPT_USERAGENT, $this->userAgent); //模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); //使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); //自动设置Referer
       // curl_setopt($curl, CURLOPT_POST, 1); //发送一个常规的Post请求
       // curl_setopt($curl, CURLOPT_POSTFIELDS, $this->send_data); //Post提交的数据包
        //curl_setopt($curl, CURLOPT_COOKIE, $this->cookie); //读取储存的Cookie信息
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); //设置超时限制防止死循环
       
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //获取的信息以文件流的形式返回
        $result = curl_exec($curl); //执行一个curl会话
        file_put_contents("d:/log.html",$result."\r\n",FILE_APPEND);
        curl_close($curl); //关闭curl*/


//看看static::这样的引用是怎么来的

abstract class Demo
{
	protected static $name = 'baixiaoshi';


	public function get_name()
	{
		echo static::$name;
        print_r("fanglei");
	}
}

class Mydemo extends Demo
{	

	//parent::get_name();
}

?>
