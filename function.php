<?PHP
/**
 * 获取一定大小的随即由数字和字母的组合
 * @return string
 * @param int $length 产生随机数的大小
 * @author 张建涛
 */
//echo '4444444444444444444444444444<br>';
//function a()
//{
//	function b()
//	{
//		echo 'this is function b';
//	}
//	echo 'this is function a';
//}
//a();
//b();
//error_reporting(E_ALL ^ E_WARNING);
//function test($a,$b)
//{
//		$param = func_get_args();
//		echo '<pre>';
//			print_r($param);
//		echo '</pre>';
//}
//test(1);
//
//
////迭代理解
//
//public interface Iterator
//{
//	//判断是否存在下一个元素
//	public abstract boolean hasNext();
//	//返回下一个可用的元素
//	public abstract Object next();
//	//移除当前元素
//	public abstract void remove();
//}
//
////容器接口
//public interface Collection extends Iterator
//{
//		public abstract Iterator iterator();
//}
//在C语言中，函数是要先定义再调用的，要么就先申明，不然的话是会报错的，因为PHP有Zend Eegine
error_reporting(E_ALL ^ E_NOTICE);
class Demo
{
	public static function sayHello()
			{
				echo 'sayHello';
			}
	public function sayHi()
	{
		echo 'sayHi';
	}
}

echo Demo::sayHello();
echo Demo::sayHi();
?>
