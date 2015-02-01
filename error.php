<?php

//错误处理的几种方法\
//1.系统自己捕获的错误
//2.自定义捕获错误
//3.自己定义错误处理函数
//异常处理
//1.try catch结构来捕获异常
//2. throw new exception();这抛出异常


//error_reporting(E_ALL ^ E_NOTICE);
//set_error_handler("errorHandler");
//
//handler($errno,$errmsg,$errfile,$errline,$context);
//try
//{
//}catch(Exception $e)
//{
//	echo $e->getMessage();
//}
//
//class MyException extends Exception
//{
//	public $errno;//错误号
//	public $errmsg;//错误信息
//	public $errfile;//错误文件名称
//	public $errline;//错误行号
//	
//	final function getMessage();
//	final function getCode();
//	final function getFile();
//	final function getLine();
//
//	function __toString();
//}
header("Content-Type:text/html;charset=utf-8");
try{
		$arr = array(1,2,3);
		throw new Exception("this is 我");
}catch(Exception $e)
{
		echo $e->getMessage();
}

?>
