<?php
	
//循环遍历目录

function getFileList($dir)
{
	if(!is_dir($dir)) exit('参数不是目录');
	$dhandler = opendir($dir);
	while(($file=readdir($dhandler)) !== false)
	{
		if($file == '.' || $file == '..') continue;
		$sonPath = $dir.'/'.$file;
		echo $file."<br/>";
		if(is_dir($sonPath)) getFileList($sonPath);

	}

}


$dir = "d:/";
$dirList = scandir($dir);
echo '<pre>';
var_dump($dirList);
echo '</pre>';


?>