<?php
	
	/**
	 * 正则表达式
	 * \w  字母[A-Za-z0-9_]
	 * \W  空白字符[^A-Za-z0-9_]
	 * \d  数字[0-9]
	 * \D  非数字[^0-9]
	 * \b匹配单词的边界
	 * \s  匹配任何空白字符，包括空格、制表符、换页符等等。等价于 [ \f\n\r\t\v]。 
	 * . 匹配除 "\n" 之外的任何单个字符。要匹配包括 '\n' 在内的任何字符，请使用象 '[.\n]' 的模式。
	 *{m,n} m个到n个
	 *
	 *\转义特殊字符  正则中的特殊字符有\  .  $  ? + * ( ) 其实就是可能在正则中产生歧义的字符就需要转义，很好理解
	 *
	 * +  1:n
	 * ?  0:1
	 * *  0:n
	 * [0-9a-zA-Z]  所有字母和数字
	 *
	 * ^以什么开头
	 *
	 * $以什么结束
	 *
	 * [abc|123]  分组匹配
	 *
	 * ()捕获获取正则
	 *
	 * (?:pattern)  匹配 pattern 但不获取匹配结果，也就是说这是一个非获取匹配，不进行存储供以后使用。这在使用 "或" 字符 (|) 来组合一个模式的各个部分是很有用。例如， 'industr(?:y|ies) 就是一个比 'industry|industries' 更简略的表达式。 
	 * (?=pattern)   windows(?=2000|98|xp) 匹配windows2000,windows98但是不能匹配windowsNT
	 * 特别说明，这种匹配目的是匹配一个位置，像^,$,\b 一样，所以我们可以把
	 * 1234567.00  变成 1,234,567.00preg_replace就可以办到
	 * (?<=pattern) 这种有一种称呼叫做零宽断语
	 * (?!pattern)	 windows(?=2000|98|xp) 不匹配括号中的，但是匹配到了windowsNT 
	 * 
	 *?  当该字符紧跟在任何一个其他限制符 (*, +, ?, {n}, {n,}, {n,m}) 后面时，匹配模式是非贪婪的。非贪婪模式尽可能少的匹配所搜索的字符串，而默认的贪婪模式则尽可能多的匹配所搜索的字符串。例如，对于字符串 "oooo"，'o+?' 将匹配单个 "o"，而 'o+' 将匹配所有 'o'。 
	 * 
	 * $1  引用第一个捕获的值
	 *
	 * i忽略大小写
	 * g全局匹配，也就是贪婪匹配
	 *
	 * (?=pattern)  正向预查，在任何匹配 pattern 的字符串开始处匹配查找字符串。这是一个非获取匹配，也就是说，该匹配不需要获取供以后使用。例如，'Windows (?=95|98|NT|2000)' 能匹配 "Windows 2000" 中的 "Windows" ，但不能匹配 "Windows 3.1" 中的 "Windows"。预查不消耗字符，也就是说，在一个匹配发生后，在最后一次匹配之后立即开始下一次匹配的搜索，而不是从包含预查的字符之后开始。
	 *
	 * 正向预查，查找一次后从头开始搜索，而不是从这次搜索的地方继续搜索，这要特别注意
	 *
	 * \s  匹配任何空白字符，包括空格、制表符、换页符等等。等价于 [ \f\n\r\t\v]。 
	 *\S  匹配任何非空白字符。等价于 [^ \f\n\r\t\v]。 
	 */
	/(?<=\d)(?=(?:\d{3})+\.)/
/*$str = 'you are my love, she name is hurong i love this girl
yestoday is a good day i love it is a good idea so i can
do every thing for he hehe i am only hehe
you are my love, she name is hurong i love this girl
yestoday is a good day i love it is a good idea so i can
do every thing for he hehe i am only hehe';

$newstr = preg_replace_callback('/\b\w/',function($matchs){
				return strtoupper($matchs[0]);
			} , $str);
echo $newstr;*/

//\用来转义
//.匹配任何非\n的字符
//\w 匹配任何一个单词字符，也就是任何一个字母
//\W 匹配任何一个非单词字符
//\d 匹配数字[0-9]
//\D 匹配非数字
//\b 匹配单词的边界
//\s 匹配空白字符
//\S 匹配非空白字符
//

$arr1 = array(
0	=> array('fid'=>1,'tid'=>1,'name'=>'Name1'),
1	=> array('fid'=>1,'tid'=>2,'name'=>'Name2'),
2	=> array('fid'=>1,'tid'=>5,'name'=>'Name3'),
3	=> array('fid'=>1,'tid'=>7,'name'=>'Name4'),
4	=> array('fid'=>3,'tid'=>9,'name'=>'Name5'),
);
function change_Arr($arr)
{
	foreach($arr as $k=>$v)
	{
		$result['fid'][] = $v;
	}
	echo '<pre>';
		print_r($result);
	echo '</pre>';
}
?>
