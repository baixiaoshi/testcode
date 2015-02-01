<?php
/*数组测试文件*/
/*
	$arr = array('a'=>'aaaaaaaa','b'=>'bbbbbbbbbbbb');
	$arr2 = array('c'=>'cccccccccccc','d'=>'dddddddddd');
	
	array_combine($arr,$arr2);//将第一个元素作为键值，第二个数组作为值
	array_merge($arr,$arr2);//将第二个数组添加到第一个数组之后，组成一个新的大的数组
	

	function callback(&$n,&$n2)
	{
		 return $n = $n.'@@@@@@';
	}
	$maparr = array_map("callback", $arr,$arr2);
	echo '<pre>';
		print_r($maparr);
	echo '</pre>';*/

/*	$a = array('name'=>1, 'aa'=>2, 'ccc'=>3, 'ddd'=>4, 'eee'=>5);
	$b = array("one"=>'yes', "two", "three", "four", "five");
	$c = array("uno", "dos", "tres", "cuatro", "cinco");

	$d = array_map(null, $a, $b, $c);
	print_r($d);*/

	//快速生成键值某个范围的数组
	/*foreach(range(0,12) as $k=>$v)
	{
		echo $k.'====>'.$v.'<br>';
	}*/

	$ar1 = array(10, 100, 100, 0);
	$ar2 = array(2,1,3,4,1000);
	/*array_multisort($ar1, $ar2);

	echo '<pre>';
		print_r($ar1);
	echo '</pre>';
	echo '-----------------------<br/>';

	echo '<pre>';
		print_r($ar2);
	echo '</pre>';*/

	$arr = $ar1 + $ar2 ; 
	echo '<pre>';
		print_r($arr);
	echo '</pre>';


?>