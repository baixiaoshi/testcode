<?php
	
	/**
	 * 闭包的概念
	 *  1.外部的函数可以调用函数内部的局部变量
	 *  2.保护了变量只在函数内部运行，不会受其他全局变量的影响
	 *  3.运行后变量还保存在栈中，没有释放，所以javascript中经常用到这个特性
	 * 运行的结果
	 * 101
	 * 102
	 * 103
	 * 104	
	 */
class Demo
{   
	public function account()
	{   
	    $total = 0;
	    $callback = function() use (&$total)
	    {
		$total = $total++;	    
	    };
	    return  $callback;

	}	
}

$demo = new Demo();
$total = $demo->account();
echo $total().'-------------';
echo $total().'-------------';
echo $total().'-------------';
echo $total().'-------------';

