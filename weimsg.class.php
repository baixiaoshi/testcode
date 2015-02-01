<?php
// +----------------------------------------------------------------------
// | Author: lion 634842632@qq.com
// +----------------------------------------------------------------------
// | 绑定微信的fakeid和用户的openid，实现用户后台主动发送消息给用户
// +----------------------------------------------------------------------
class Weimsg
{	
	public static $return_data = array();
	public static $use_data = array();

	
	public function __construct($username,$pwd)
	{
		header("Content-Type:text/html; charset=utf-8");
		self::$use_data['cookie_file'] = tempnam('./temp','cookie');
		self::$use_data['username'] = $username;
		self::$use_data['pwd'] = md5($pwd);
		self::login();
		self::get_fakeid();
		self::bind_fakeid_openid();
	}

	//--------------------------------------------------------------------------------
	
	/**
	 * 获取返回的数据
	 * @return [type] [description]
	 */
	public static function getdata()
	{
		return self::$return_data;
	}
	public static function abc()
	{
		return self::$use_data;
	}

	//--------------------------------------------------------------------------------

	/**
	 * 模拟登入，目的获取token
	 * @return string 返回token值
	 */
	public static function login()
	{
		$login_url = 'https://mp.weixin.qq.com/cgi-bin/login';
		$data = 'f=json&imgcode=&pwd='.self::$use_data['pwd'].'&username='.self::$use_data['username'];
		$ch = curl_init($login_url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_COOKIEJAR,self::$use_data['cookie_file']);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($ch,CURLOPT_REFERER,'https://mp.weixin.qq.com');
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		$content = curl_exec($ch);
		curl_close($ch);
		$newurl = json_decode($content,1);
		$newurl = $newurl['redirect_url'];
		$arr = explode('token=', $newurl);
		return self::$use_data['token'] = $arr[1];//获取token值

	}

	//--------------------------------------------------------------------------------

	/**
	 * 获取fakeid和nickname
	 * @return 无
	 */
	public static function get_fakeid()
	{
		$go_url = "https://mp.weixin.qq.com/cgi-bin/contactmanage?t=user/index&pagesize=10&pageidx=0&type=0&token=".self::$use_data['token']."&lang=zh_CN";
		$ch = curl_init($go_url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_COOKIEFILE,self::$use_data['cookie_file']);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$content = curl_exec($ch);
		preg_match('/friendsList\s?:\s?\((.*)\)\.contacts/i',$content,$match);
		$matcharr = json_decode($match[1],true);
		$target_info = $matcharr['contacts'][0];
		curl_close($ch);
		self::$return_data['fakeid'] = $target_info['id'];//获取到fakeid
		self::$return_data['nickname'] = $target_info['nick_name'];//获取到nickname
		return;
	}


	//--------------------------------------------------------------------------------

	/**
	 * 获取发送内容和openid
	 * @return [type] [description]
	 */
	public static function bind_fakeid_openid()
	{
		$go_url = "https://mp.weixin.qq.com/cgi-bin/singlesendpage?t=message/send&action=index&tofakeid=".self::$return_data['fakeid']."&token=".self::$use_data['token']."&lang=zh_CN";
		
		$ch = curl_init($go_url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_COOKIEFILE,self::$use_data['cookie_file']);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$content = curl_exec($ch);
		preg_match('/\"msg_items\":(.*\}\}\]\})/i',$content,$match);
		$info = json_decode($match[1],true);
		$chinfo = $info['msg_item'][0]['content'];
		self::$return_data['content'] = $chinfo;
		preg_match('/sandongid=(.*)=sandong/i',$chinfo,$match2);
		self::$return_data['openid'] = $match2[1];
		curl_close($ch);
		return ;
	}


}