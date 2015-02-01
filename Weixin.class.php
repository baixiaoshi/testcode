<?php
// +----------------------------------------------------------------------
// | Author: lion 634842632@qq.com
// +----------------------------------------------------------------------
// | 微信开发
// +----------------------------------------------------------------------
define('TOKEN','weixin');
class Weixin
{	
	/**
	 * 类的入口函数
	 * @return [type] [description]
	 */
	public function run()
	{
		$this->valid();
	}
	//-------------------------------------------------------------------
	//接收消息
	//
	
	public function responseMsg()
	{
		$wxStr = file_get_contents("php://input");
		//用SimpleXML来解析
		$xmlobj = simplexml_load_string($wxStr, 'SimpleXMLElement', LIBXML_NOCDATA);
		$msgType = $xmlobj->msgType;
		switch($msgType)
		{
			case "text":
				$this->response_text($xmlobj);//回复文本
				break;
			case "image":
				$this->response_image($xmlobj);//回复图片
				break;
			case "voice":
				$this->response_voice($xmlobj);//回复声音
				break;
			case "video":
				$this->response_video($xmlobj);//回复视频
				break;
			case "music":
				$this->response_music($xmlobj);//回复音乐
				break;
			case "news":
				$this->response_news($xmlobj);//回复图文
				break;
		}
	}




	//-------------------------------------------------------------------
	//返回消息
	//
	private function response_text($xmlobj)
	{

	}

	private function response_image($xmlobj)
	{
		
	}

	private function response_voice($xmlobj)
	{
		
	}

	private function response_video($xmlobj)
	{
		
	}

	private function response_music($xmlobj)
	{

	}

	private function response_news($xmlobj)
	{
		
	}





	private function valid()
	{
		if(isset($_GET['echostr']))
		{
			$this->responseMsg();
			exit;
		}
		else
		{
			if($this->checkSignature())
			{
				echo $_GET['echostr'];
				exit;
			}
		}
	}
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		return ( $tmpStr == $signature ) ? true : false;
	}
}
?>