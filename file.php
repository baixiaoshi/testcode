<?php

	/**
	 * 文件增删改查
	 * 文件的属性
	 * 目录的操作
	 * 文件的权限
	 */
	
	 //fopen(filename, mode);
	// fgetc(handle);
	/* fgets(handle);
	 fclose(handle);
	 file_put_contents(filename, data);
	 file_get_contents(filename);
	 file(filename)

	 unlink(filename);
	 rmdir(dirname);
	 clearstatcache();

	 copy(source, dest);
	 move_uploaded_file(filename, destination);//把上传的文件移动到另外一个文件夹
	 realpath();//去除文件中的./ ../类似这样的相对路径,而是返回这个表达式结果的路径
	 filesize(filename);
	 is_file(filename);
	 file_exists(filename);
	 fileatime(filename);//文件上次访问时间
	 filemtime(filename);//文件修改时间
	 filectime(filename)//文件创建时间

	 basename(path);//获取文件名，如index.php  则为Index
	 mkdir(pathname);//创建目录

	 chown(filename, user);//改变用户所有 者
	 chmod(filename, mode);//改变文件权限
	 chgrp(filename, group);//改变文件所在组
	 dirname(path);//返回完整路径所在目录
	 umask();//linux系统的默认权限*/

	 //echo basename(__FILE__,'.php');
	
	/*$from = '/home/ftp123/aa.txt';
	$to = '/home/samba/bb.txt';
	function relativePath($from, $to, $ps = DIRECTORY_SEPARATOR)
	{
	  $arFrom = explode($ps, rtrim($from, $ps));//去除字符串最后的分隔符
	  $arTo = explode($ps, rtrim($to, $ps));//去除字符串最后的分隔符
	  while(count($arFrom) && count($arTo) && ($arFrom[0] == $arTo[0]))
	  {
	    array_shift($arFrom);
	    array_shift($arTo);
	  }
	 //这里是str_pad的妙用
	  return str_pad("", count($arFrom) * 3, '..'.$ps).implode($ps, $arTo);
	}

	echo relativePath($from,$to,'/');
*/

//$fp = fopen('sss.txt','r+');
//$str = stream_get_contents($fp);
//var_dump($str);
//print_r(stream_get_transports());
//
//print_r(stream_get_wrappers());
//
//print_r(stream_get_filters());

$timeout = ini_get('default_socket_timeout');
$fp = fsockopen("www.mmduo.cc", 80, $errno, $errstr, $timeout);
var_dump($fp);

if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: www.mmduo.cc\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
	$str = '';
    while (!feof($fp)) {
       $str .= fgets($fp, 1024);
    }
	file_put_contents("./log.html",$str."\r\n",LOCK_EX);
    fclose($fp);
}


$fp = fopen('http://www.baidu.com','rb');
$stream = stream_get_meta_data($fp);
var_dump($stream);
$result = '';
while(!feof($fp))
{
	$result .= fgets($fp,1024);
}

echo $result;
fclose($fp);
?>
