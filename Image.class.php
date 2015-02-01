<?php
// +----------------------------------------------------------------------
// | Author: lion 634842632@qq.com
// +----------------------------------------------------------------------
// | 图片上传类
// +----------------------------------------------------------------------
class Image
{	
	private $config = array(
		'save_path' => 'd:/upload',
		'formname'	=> 'file',
		'type'		=>	array('jpeg','gif','jpg','bmp'),
		'maxsize'	=>  2048,
		'max_width'	=>	1024,
		'max_height'=>  768,
		'is_wh'     =>  0,
		'thumb_width'=>0,
		'thumb_height'=>0,
		'clip_width' =>0,
		'clip_height' =>0,

		);

	public function __construct()
	{	header('Content-Type:text/html; charset=utf-8');
		if(version_compare(PHP_VERSION,'5.0') < 0) exit('php版本必须大于5.0');
		if(!is_dir($this->config['save_path'])) mkdir($this->config['save_path'],0777,true);
	}

	/**
	 * 图片上传操作
	 * 1.保存
	 * 2.验证图片尺寸
	 * 3.验证图片格式
	 * 4.验证图片长宽
	 * @return [type] [description]
	 */
	public function upload()
	{	
		//如果是单文件上传
		if($this->is_sigle())
		{	
			$imgurl = $this->save($_FILES[$this->config['formname']]['name']);
			$info = $this->getImage($imgurl);
			echo '<pre>';
				print_r($info);
			echo '</pre>';
			$type = $info['type'];
			if(!in_array($type, $this->config['type'])) $this->msg(0,'图片类型错误');
			if(filesize($imgurl) > intval($this->config['maxsize'])) $this->msg(0,'图片太大了');
			//如果需要验证图片的长和宽
			if($this->config['is_wh'])
			{
				if(intval($info['width']) > intval($this->config['max_width']) || intval($info['height']) > intval($this->config['max_height']))
				{
					$this->msg(0,'图片长度或者宽度超出');
				}
			}
		}
	}



	/**
	 * 生成图片缩略图
	 * @return [type] [description]
	 */
	public function thumb()
	{

	}

	/**
	 * 生成水印
	 * @return [type] [description]
	 */
	public function water()
	{

	}


	//---------------------------------------------------------------------------
	

	/**
	 * 判断是多文件上传还是单文件上传
	 * @return boolean [description]
	 */
	private function is_sigle()
	{
		return is_array($_FILES[$this->config['formname']]['name']) ? false : true;
	}


	//---------------------------------------------------------------------------
	
	/**
	 * 获取图片长宽
	 * @return [type] [description]
	 */
	public function getImage($imgurl)
	{
		//list($width,$height,$type) = getimagesize($imgurl);
		$res = getimagesize($imgurl);

		return array('width'=>$width,'height'=>$height);
	}

	/**
	 * 获取文件的后缀名
	 * @param  [type] $imgurl [description]
	 * @return [type]         [description]
	 */
	private function _gettype($imgurl)
	{
		return pathinfo($imgurl,PHPINFO_EXTENSION);
	}

	//---------------------------------------------------------------------------
	

	/**
	 * 将上传文件上传到指定目录
	 * @return [type] [description]
	 */
	public function save($imgname)
	{	
		move_uploaded_file($_FILES[$this->config['formname']]['tmp_name'], $this->config['save_path'].'/'.$imgname);
		
		return $this->config['save_path'].'/'.$imgname;
	}


	//---------------------------------------------------------------------------
	
	/**
	 * 删除文件
	 * @param  [type] $imgurl [description]
	 * @return [type]         [description]
	 */
	public function rm($imgurl)
	{
		unlink($imgurl);
	}

	//---------------------------------------------------------------------------
	

	/**
	 * [msg description]
	 * @return [type] [description]
	 */
	public function msg($status,$msg)
	{
		$return = array('status'=>$status,'msg'=>$msg);
		$json = json_encode($return);
		$return = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))", $json);
		echo $return;
		exit();
	}


	//---------------------------------------------------------------------------
	
	/**
	 * 用户自定义配置数组
	 * @param Array $config 自定义的配置数组
	 */
	public function set($config)
	{
		$keys = array_keys($this->config);
		while(list($k,$v) = each($this->config))
		{
			if(in_array($k, $keys))
			{
				$this->config[$k] = $v;
			}
		}
	}



}