<?php
// +----------------------------------------------------------------------
// | Author: lion 634842632@qq.com
// +----------------------------------------------------------------------
// | php工厂模式
// +----------------------------------------------------------------------

interface IUser
{
	function getName();
}

class User implements IUser
{
	public function __construct($id)
	{

	}

	public function getName()
	{
		return 'xiaobai';
	}
}

class UserFactory
{
	public static function Create($id)
	{
		return new User($id);
	}
}


//使用
$uo = UserFactory::Create(1);
echo $uo->getName();


?>
