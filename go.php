<?php

/*$arr = array(1,2,3);
$arr2 = array('A','B','C','D','E','F','G');
$result = array_intersect_key($arr2,$arr);

echo '<pre>';
	print_r($result);
echo '</pre>';*/


/*ob_end_clean();
echo '-----------------------------------<br>';
$status2 = ob_get_status(true);
echo '<pre>';
	print_r($status2);
echo '</pre>';*/


$json = '{"28":1,"29":1,"30":1,"31":1,"32":3,"33":1,"34":3,"35":2,"36":1,"37":3,"38":2,"47":1}';
$result_id = 8;
$prob_id = 33;
//$result = preg_replace('/(\"'.$prob_id.'\"\:)\d,/', "$1".$result_id.",", $json);
//$result = preg_replace('/\}/',",\"".$prob_id."\":".$result_id."}",$json);
$result = strpos($json,'"'.$prob_id.'":');
var_dump($result);
?>