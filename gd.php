<?php

	/*$str =  '39_4|40_4|41_2|42_3|43_1|44_1|45_1|46_1|48_1|49_1|50_1|51_1|52_2';

	$extArr = explode('|', $str);
	$targetArr = array();
	for($i=0,$j=count($extArr);$i<$j;$i++)
	{
		list($k,$v) = explode('_', $extArr[$i]);
		
		$targetArr[$k] = $v;
	}

	echo '<pre>';
		print_r($targetArr);
	echo '</pre>';*/

	$arr = array(
		28	=>	1,
		29	=>	1,
		30	=>	1,
		31	=>	1,
		32	=>	3,
		33	=>	1,
		34 	=>	3,
		35	=>	2,
		36	=>	1,
		37	=>	3,
		38	=>	2,
		47	=>	1
		);

	echo json_encode($arr);

?>