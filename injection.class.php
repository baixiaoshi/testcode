<?php
/**
 * 正确理解laravel框架中使用的Ioc容器的依赖注入
 * 依赖，注入，容器
 *
 * 注入:就是代码包含，就是require include
 * 依赖: 代码需要其它类中的方法，就是依赖
 * 容器: 容器来解决依赖关系 ，把需要用到的类库全部放在一个容器当中来解决，而不是在代码中包含
 */

class Registry
{
	protected static $_connection;

	protected static function _createConnection()
	{
		return new Connection(array(
				'host'	=>	'localhost',
				'username'	=>	'root',
				'password'	=>	'secret',
				'dbname'	=>	'test'	
			));
	}

	/**
	 * 获取共享链接
	 * @return [type] [description]
	 */
	public static function getSharedConnection()
	{
		if(self::$_connection ==== null)
		{

			$connection = self::_createConnection();
			self::$_connection = $connection;
		}
		return self::$_connection;

	}

	/**
	 * 创建一个新的方法
	 * @return [type] [description]
	 */
	public static function getNewConnection()
	{
		return self::_createConnection();
	}


}

//定义一个组件
class SomeComponent
{
	protected $_connection;

	public function setConnection($connection)
	{
		$this->_connection = $connection;
	}

	public function someDbTask()
	{
		$connect = $this->_connection;
	}
}

$some = new SomeComponent();//实例化一个组件
$some->setConnect(Registry::getSharedConnection());
$some->someDbTask();


//用容器来实现依赖注入
class SomeComponent
{
	protected $_di;
	public function __construct($di)
	{
		$this->_di = $di;//这里的$di是一个容器
	}

	public function someDbTask()
	{
		$connection = $this->_di->get('db');
	}

	public function someOtherDbTask()
	{
		$connection = $this->_di->getShared('db');
		$filter = $this->_db->get('filter');
	}

}

$di = new Phalocon\DI();
$di->set('db',function(){
	return new Connection(
			array(
				'host'	=>	'localhost',
				'username'	=>	'root'
				);
		);
});
$di->set('filter',function(){
	return new Filter();
});
$di->set('session',function(){
	return new Session();
});


$some = new SomeComponent($di);
$some->someTask();