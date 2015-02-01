<?php
// +----------------------------------------------------------------------
// | Author: lion 634842632@qq.com
// +----------------------------------------------------------------------
// | 分页类
// | 1.上一页 页码  下一页  共多少页  去第几页
// | 2.页码显示问题 
// |     2.1  1,2,3,4,5,6,……,下一页
// |     2.2  1,2,……,  大于6的时候去当前页前两个，后两个
// |     2.3  当前页小于5的时候出现单个省略号
// +----------------------------------------------------------------------
class Page
{	
	public $page = 1;//默认第一页
	public $pagesize = 10;//默认10条记录
	public $total;//总记录数
	public $pagenum;//总页数
	public $curpage = 1;
	public $config = array(
		'prev'	=>	'上一页',
		'next'	=>  '下一页',
		'total'	=>  '共',
		'page'	=>	'页',
		'go'	=>  '去第'
		);
	/**
	 * 构造函数初始化分页类中的变量
	 */
	public function __construct($total,$pagesize)
	{	header('Content-Type:text/html;charset=utf-8');
		$this->total =  $total;
		$this->pagesize = $pagesize;
		$this->pagenum = ceil(($this->total)/($this->pagesize));//总页数
		$this->curpage = isset($_GET['page']) ? $_GET['page'] : 1;
		
	}

	/**
	 * 初始化分页类，获取可以使用的url
	 * @return [type] [description]
	 */
	private function _geturl()
	{	
		$query_url = '';
		if(isset($_GET['page']) && !empty($_GET['page']))
		{	
			unset($_GET['page']);
			unset($_GET['pagesize']);
			$query_url = http_build_query($_GET);	
		}

		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$query_url;
		return $url;
	}


	/**
	 * 计算显示的页码部分
	 * 如果页数 1<page<7   只显示页码
	 * page>7   当前在1~6,右边显示省略号
	 * 当前页  6<curpage<$total-5 显示两边省略号
	 * 当前页    $total-5<curpage  显示左边的省略号
	 * @return [type] [description]
	 */
	private function _pagination()
	{
		$pagestr = "<ul>";
		if($this->pagenum <= 7)
		{
			for($i=1;$i <= $this->pagenum;$i++)
			{	
				if($this->curpage == $i)
				{
					$pagestr .= '<li class="cur"><a href="'.$this->_geturl().'&page='.$i.'&pagesize='.$this->pagesize.'">'.$i.'</a></li>';
				}
				else
				{
					$pagestr .= '<li><a href="'.$this->_geturl().'&page='.$i.'&pagesize='.$this->pagesize.'">'.$i.'</a></li>';
				}
				
			}
		}
		elseif($this->pagenum > 7)
		{
			//1.当前页小于6  中间  最后
			if($this->curpage <=5 )
			{
				for($i = 1;$i <= 5;$i++)
				{ 
					if($this->curpage == $i)
					{
						$pagestr .= '<li class="cur"><a href="'.$this->_geturl().'&page='.$i.'&pagesize='.$this->pagesize.'">'.$i.'</a></li>';
					}
					else
					{
						$pagestr .= '<li><a href="'.$this->_geturl().'&page='.$i.'&pagesize='.$this->pagesize.'">'.$i.'</a></li>';
					}
				}
				$pagestr .='<li>...</li>';
			}
			elseif($this->curpage < intval($this->pagenum)-5)
			{
				$pagestr .= '<li><a href="'.$this->_geturl().'&page=1&pagesize='.$this->pagesize.'">1</a></li>';
				$pagestr .= '<li><a href="'.$this->_geturl().'&page=2&pagesize='.$this->pagesize.'">2</a></li>';
				$pagestr .='<li>...</li>';
				for($i = intval($this->curpage)-2; $i<= intval($this->curpage)+2;$i++)
				{
					if($this->curpage == $i)
					{
						$pagestr .= '<li class="cur"><a href="'.$this->_geturl().'&page='.$i.'&pagesize='.$this->pagesize.'">'.$i.'</a></li>';
					}
					else
					{
						$pagestr .= '<li><a href="'.$this->_geturl().'&page='.$i.'&pagesize='.$this->pagesize.'">'.$i.'</a></li>';
					}
				}
				$pagestr .='<li>...</li>';
			}
			else
			{	

				$pagestr .='<li>...</li>';
				for($i=intval($this->pagenum)-5;$i<=intval($this->pagenum);$i++)
				{
					if($this->curpage == $i)
					{
						$pagestr .= '<li class="cur"><a href="'.$this->_geturl().'&page='.$i.'&pagesize='.$this->pagesize.'">'.$i.'</a></li>';
					}
					else
					{
						$pagestr .= '<li><a href="'.$this->_geturl().'&page='.$i.'&pagesize='.$this->pagesize.'">'.$i.'</a></li>';
					}
				}
			}
		}
      	return $pagestr;
	}
	/**
	 * 实现下一页的功能，主要组合url
	 * @return [type] [description]
	 */
	private function _next()
	{
		return '<span><a href="'.$this->_geturl().'&page='.(intval($this->curpage)+1).'&pagesize='.$this->pagesize.'">'.$this->config['next'].'</a></span>';
	}

	/**
	 * 实现上一页的功能
	 * @return [type] [description]
	 */
	private function _prev()
	{
		return '<span><a href="'.$this->_geturl().'&page='.(intval($this->curpage)-1).'&pagesize='.$this->pagesize.'">'.$this->config['prev'].'</a></span>';
	}

	/**
	 * 去第几页
	 * @return [type] [description]
	 */
	private function _go()
	{	
		if(intval($this->curpage) == intval($this->pagenum))
		{
			$gonum = $this->pagenum;
		}
		else
		{
			$gonum = intval($this->curpage) +1;
		}
		$gostr = $this->config['go'];
		$gostr .='<input type="text" name="gonum" value="'.$gonum.'" id="gonum" onfocus="showcheck();" onblur="hiddencheck();"/>';
		$gostr .='<input type="button" value="确定" id="checknum" style="display:none"/>';
		$gostr .='<script type="text/javascript">function showcheck(){ var check_input = document.getElementById("checknum");check_input.style.display="inline-block"} function hiddencheck(){ var check_input=document.getElementById("checknum");check_input.style.display="none"}</script>';
		return $gostr;
	}

	/**
	 * 传入一个config数组对输出进行配置
	 * @param [type] $name [description]
	 */
	public function set($config)
	{
		foreach($config as $k=>$v)
		{
			if(in_array($k,array_keys($this->config)))
			{
				$this->config[$k] = $v;
			}
		}
	}

	/**
	 * 总共多少页的部分
	 * @return [type] [description]
	 */
	private function _totalText()
	{
		return '<span>'.$this->config['total'].$this->pagenum.$this->config['page'].'</span>';
	}
	/**
	 * 输出分页类的html代码
	 * @return [type] [description]
	 */
	public function pageStr()
	{	
		(intval($this->curpage) ==1) ? $prev="" : $prev=$this->_prev();
		(intval($this->curpage) == intval($this->pagenum)) ? $next="" : $next=$this->_next();
		return $prev.$this->_pagination().$next.$this->_totalText().$this->_go();
	}
}


?>