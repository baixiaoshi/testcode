<?php
	//接口和抽象类的区别在于，抽象类中可以定义具体的方法
	// 接口中只能定义方法
	//接口
//	interface one
//	{
//		function fn1();
//		function fn2();
//	}
//
//	//定义一个类实现接口
//	class OneClass implements one
//	{
//		public function fn1()
//		{
//
//		}
//
//		public function fn2()
//		{
//
//		}
//	}
//
//
//	//抽象类
//	abstract class two implements one
//	{
//		abstract function fn1();
//		abstract function fn2();
//	}
//
//	//抽象类的实现
//	class four extends two
//	{
//		function fn1()
//		{
//
//		}
//
//		function fn2()
//		{
//			
//		}
//	}
//
//	//静态类中只能调用静态方法，因为静态类不需要实例化
//	//所以不能调用动态的方法
//
//	class B
//	{
//		public function b()
//		{
//
//		}
//	}
//
//	class C extends B
//	{	
//		public function c()
//		{
//
//		}
//	}


//	abstract class Demo
//	{
//		public function fn1()
//		{
//			echo 'function 1';
//		}
//	}
	
	//$abstractClassObj = new Demo();
	//var_dump($abstractClassObj);
//	interface Demo{
//		public function fn1();
//	}
//
//	class SonDemo implements Demo
//	{
//		public function fn1()
//		{
//			echo 'this is function 1';
//		}
//	}
//	$obj = new SonDemo();
//	$obj->fn1();
//
//
//	class Demo
//	{
//		public function __set($key,$val)
//		{
//			
//		}
//
//		public function __get($key)
//		{
//			return 
//		}
//	}

	//实例化对象其实是对象的引用，并不是对象的复制，如果想要用复制，就用__clone这个魔术方法
	//
	//类的操作方法	
//   get_class_methods('ClassName');
//   get_class_vars();
//	method_exists();
//   property_exists();
//   class_exists();
//	class_alias('original','alias','autoload');
	//	get_classed_class();
//	get_object_vars();
//	get_parent_class();
//	interface_exists();
//	is_a();
//	__autoload('className');
//
//	//自己写一个模仿autoload机制的方法
//	function myautoload($className)
//	{
//		$className = strtolower($className);
//		$classPath = $_SERVER['DOCUMENT_ROOT'].'/'.$className.'class.php';
//		
//		if(is_file($classPath) && !class_exists($className)) require_once $clasPath;
//
//	}		
//error_reporting(E_ALL & ~E_NOTICE);
//	class Demo
//	{   
//		public $age =  23;
//		static public $name = 'hello';
//		static public function sayHi()
//		{
//			echo 'hello world';
//		}
//		public function sayHello()
//		//			echo $this->age;
//		}
//	}
//	
//   Demo::sayHi();
//	Demo::sayHello();

//测试接口是否可以继承接口

//interface Demo
//{
//	public function fn1($a,$b);
//	public function fn2();
//	public function fn3();
//}
//
//interface Demo2 extends Demo
//{
//	public function fn4();
//}
//
//class Demo3 implements Demo
//{
//	public function fn4()
//	{
//		echo 'function 2';
//	}
//	public function fn1($c,$b){
//		echo 'function 1';
//	}
//	public function fn2(){}
//	public function fn3(){}
//}
//$demo3 = new Demo3();
//$demo3->fn1(1,3);
//
//abstract class Mydemo
//{
//	abstract public function fn1();
//	public function fn2()
//	{
//		echo 'function 2';
//	}	
//}
//
//class Mydemo2 extends Mydemo
//{
//	public function fn1()
//	{
//		echo 'function 1';
//	}	
//}
//$mydemo = new Mydemo2();
//$mydemo->fn1();
//$mydemo->fn2();

//类的重载

//class ParentClass
//{
//	public function fn1()
//	{
//		echo 'ParentClass function 1';
//	}
//	public function fn2()
//	{
//		echo 'ParentClass function 2'.'<br/>';
//		$rst = method_exists($this,"fn3");
//		var_dump($rst);
//	}
//}
//
//class SonClass extends ParentClass
//{
//	public function fn3()
//	{
//		echo 'SonClass function 3';
//	}
//}
//
//$parentClass = new ParentClass();
//$parentClass->fn2();
//$sonClass = new SonClass();
//$sonClass->fn2();
//多态的原理，就是在父类中传入子类的对象，就是将变量指向对象就是这人道理
//

class ParentClass
{
	public function say()
	{
		echo 'i am say function';
	}

	public function run(Fast $fast)
	{
		$fast->gofast();
	}

	
}

class Fast
{
	public function gofast()
	{
		echo 'i am gofast function';
	}
}

class Fight
{
	public function gofast()
	{
		echo 'i am function fight gofast';
	}
}
$fight = new Fight();
$newfast = 'new fast';
$parentClass = new ParentClass();
$fast = new Fast();
$parentClass->run($fast);
//$parentClass->run($fight);
?>
