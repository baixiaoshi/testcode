<?php

//冒泡排序算法
//1.就是把大的放到最前面，也可以叫做逆序
//2.采用逐一比较的方法
//3.此算法的重要特点是第一个和最后一个先比较，这样才能把最大的放到前面

/*$tmpArr = array(1,3,4,5,7,6,9,2,90,34,45,100,2,3);
for($i=0,$count = count($tmpArr)-1;$i<$count;$i++)
{

	for($j=$count;$j>$i;$j--)
	{
		if($tmpArr[$i] < $tmpArr[$j])
		{
			$tmp = $tmpArr[$i];
			$tmpArr[$i] = $tmpArr[$j];
			$tmpArr[$j] = $tmp;
		}
	}
}

echo join('>', $tmpArr);*/


//快速排序实现原理
//1.采用分开治理的思想,先拿第一个元素作为中界线，大的放前面，小的放后台
//2.这样再使用一个递归的思想

/*$tmpArr = array(1,6,3,4,5,7,6,9,2,90,34,45,100,2,3);

function quickSort($array)
{
	$count = count($array);
	if($count <=1) return $array;
	$key = $array[0];
	$leftArr = array();
	$rightArr = array();
	for($i=1;$i<$count;$i++)
	{
		if($array[$i] < $key)
		{
			$leftArr[] = $array[$i];
		}
		else
		{
			$rightArr[] = $array[$i];
		}
	}
	$leftArr = quickSort($leftArr);
	$rightArr = quickSort($rightArr);
	
	return array_merge($leftArr,array($key),$rightArr);

}
echo '<pre>';
	print_r(quickSort($tmpArr));
echo '</pre>';*/
//echo join('<',quickSort($tmpArr));

//快速排序法
//1.把第一个元素取出来作为标准数

/*function quickSort(array $arr)
{
	$len = count($arr);
	if($len <=1) return $arr;
	$leftArr = array();
	$rightArr = array();
	$key = $arr[0];//取一个标准
	for($i=1;$i<$len;$i++)
		($arr[$i] < $key) ? $leftArr[] = $arr[$i] : $rightArr[] = $arr[$i] ;
	$leftArr = quickSort($leftArr);
	$rightArr = quickSort($rightArr);
	return array_merge($leftArr,array($key),$rightArr);
}

$tmpArr = array(1,6,3,4,5,7,6,9,2,90,34,45,100,2,3,232,242,345345,4534);
echo join('<',quickSort($tmpArr));*/


//顺序查找

/*function  sequnceSearch($target,$arr)
{	

	for($i=0;$i<19;$i++)
	{	
		if($arr[$i] == $target)
		{
			return $arr[$i];
		}
		
	}
	return false;
}
$tmpArr = array(1,6,3,4,5,7,6,9,2,90,34,45,100,2,3,232,242,345345,4534);

var_dump(sequnceSearch(100,$tmpArr));*/


//二分法查找原理
//1.二分法查找是建立在一个已经排好序的数组当中，而不是杂乱的数组

/*function bin_search($arr,$min,$max,$key)
{
	if($min < $max)
	{
		$mid = ceil(($min + $max) / 2 ) ;
		echo $mid."=======".$key."<br/>";
		if($arr[$mid] == $key)
			return $mid;
		if($arr[$mid] < $key)
			return bin_search($arr,$mid+1,$max,$key);
		if($arr[$mid] > $key)
			return bin_search($arr,$min,$mid-1,$key);
		return false;
	}		
}

$tmp = array(1,2,3,4,5,6,7,8,9,20,23,34);
sort($tmp);
$result = bin_search($tmp,1,10,20);
var_dump($result);*/

// 二维数组的排序
// 1.能够排序数字
// 2.能够排序拼音
// 3.可以是否保持键值对


function quickSort($arr)
{	

	if(!is_array($arr)) return;
	$leftArr = array();
	$rightArr = array();
	$key = intval($arr[0]);
	//var_dump($arr);
	for($i=1,$count=count($arr);$i<$count;$i++)
	{
		if($arr[$i] < $key)
		{
			$leftArr[] = $arr[$i];
		}
		else
		{
			$rightArr[] = $arr[$i];
		}
	}
	$leftArr = quickSort($leftArr);
	$rightArr = quickSort($rightArr);
	return array_merge($leftArr,array($key),$rightArr);
}


//冒泡法

function buble($arr)
{
	$count = count($arr);
	for($i=0;$i<$count-1;$i++)
	{
		for($j=$count-1;$j>$i;$j--)
		{
			if($arr[$i] < $arr[$j])
			{
				$tmp = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $tmp;
			}
		}
	}
	return $arr;
}


$tmpArr = array(1,6,3,4,5,7,6,9,2,90,34,45,100,2,3,232,242,345345,4534);
$rst = buble($tmpArr);
echo join('>',$rst);


//二分法查找

function bin_search($arr,$low,$max,$key)
{
	$mid = floor(($low+$max)/2);

	if($arr[$mid] == $key)
	{
		return $arr[$mid];
	}else if($arr[$mid] < $key)
	{
		return bin_search($arr,$low,$mid-1,$key);
	}else
	{
		return bin_search($arr,$mid+1,$max,$key);
	}
}

?>