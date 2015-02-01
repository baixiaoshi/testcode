<?php
header("Content-Type:text/html; charset=utf-8");
setcookie("username","baixiaoshi",time()+36000,"/");
//echo $_COOKIE['username']."<br/>";

setcookie("username","",time()-3600);

//echo $_COOKIE['username'];