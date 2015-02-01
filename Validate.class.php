<?php
// +----------------------------------------------------------------------
// | Author: lion 634842632@qq.com
// +----------------------------------------------------------------------
// | php验证类，练习写类的最好方法就是把这些类写到想吐
// +----------------------------------------------------------------------

class Validate
{
	public $width;	//图片宽度
	public $height;	//图片高度
	public $codeNums = 4;	//验证码数量
	private $image;	//画布资源对象


	public function __construct($width,$height,$codeNums)
	{	
		$this->width = $width;
		$this->height = $height;
		$this->codeNums = $codeNums;
		$this->image = imagecreatetruecolor($this->width, $this->height);
	}


	/**
	 * 获取验证码文字
	 * @return [type] [description]
	 */
	public function getCode()
	{
		$assic = 0;
		$code = '';
		for($i=0;$i<intval($this->codeNums);$i++)
		{	
			$rand = rand(0,2);
			switch($rand)
			{
				case 0:
					$assic = rand(48,57);//输出数字0~9
					break;
				case 1:
					$assic = rand(65,90);//输出数字A-Z
					break;
				case 2:
					$assic = rand(97,122);//输出数字a-z
					break;
			}
			$char = chr($assic);//将ASSIC码转化成字符
			$code .= $char;
		}

		return $code;
	}


	/**
	 * 输出验证码图片
	 * 这整张画布上画满100个点作为干扰元素
	 * @return [type] [description]
	 */
	public function imageCode()
	{	
		$this->canvas();
		$this->outputText();
		$this->troubDot();
		$this->outputImage();
		
	}


	/**
	 * 输出彩色文字
	 * 1.按文字个数把画布分成多少格
	 * 2.在相应的X坐标中写出字符
	 * @return [type] [description]
	 */
	private function outputText()
	{	
		$fontfile = "georgiab.ttf";
		//$fontsize = 5;
		$code = $this->getCode();

		$unitWidth = floor($this->width/$this->codeNums);
		for($i=0;$i<$this->codeNums;$i++)
		{	
			$color = imagecolorallocate($this->image, rand(0,255), rand(0,255), rand(0,255));
			imagettftext($this->image, 24, 0, $i*$unitWidth+2, $this->height-5, $color, $fontfile, $code[$i]);
			//imagechar($this->image, $fontsize,$i*$unitWidth+2, 0,$code[$i], $color);
		}
	}
	/**
	 *	画出100个干扰点
	 * @return [type] [description]
	 */
	private function troubDot()
	{
		for($i=0;$i<200;$i++)
		{
			$color = imagecolorallocate($this->image,rand(0,255),rand(0,255),rand(0,255));
			imagesetpixel($this->image, rand(1,$this->width-2), rand(1,$this->height-2), $color);
		}
	}


	/**
	 * 输出图片
	 * @return [type] [description]
	 */
	private function canvas()
	{	
		$color = imagecolorallocate($this->image,237, 247, 255);
		//imagerectangle($this->image, 0, 0, $this->width, $this->height,$color);
		imagefilledrectangle($this->image, 0, 0, $this->width, $this->height, $color);
	}

	/**
	 * 输出一个png格式的图片
	 * @return [type] [description]
	 */
	private function outputImage()
	{	
		header("Content-Type: image/png");//告知浏览器输出PNG图片
		imagepng($this->image,null);
	}

	/**
	 * 销毁图像资源
	 */
	public function __destruct()
	{
		imagedestroy($this->image);
	}


}

?>