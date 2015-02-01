<?php
// +----------------------------------------------------------------------
// | Author: lion 634842632@qq.com
// +----------------------------------------------------------------------
// |  自定义数据库连接类
// +----------------------------------------------------------------------
	class Mysql{
	
		private $host='';
		private $username='';
		private $password='';
		private $tbname='';
		private $dbname='';
		private $linkID='';
		private  $res='';

		/**
		 * 初始化数据库连接
		 * @param [type] $host   [description]
		 * @param [type] $username  [description]
		 * @param [type] $password    [description]
		 * @param [type] $dbname [description]
		 */
		private function __construct($host,$username,$password,$dbname){
		
			$this->host=$host;
			$this->uname=$username;
			$this->pwd=$password;
			$this->tbname=$dbname;
			$this->init_conn();
		
		}

		/**
		 * 连接数据库
		 * @return [type] [description]
		 */
		public function init_conn(){
			$this->linkID = mysql_connect($this->host,$this->uname,$this->pwd)  or  die('mysql连接错误'.mysql_error());
			mysql_select_db($this->dbname,$this->linkID);
			mysql_query("set names utf8");		
		}


		/**
		 * 执行一条sql语句
		 * @param  [type] $sql [description]
		 * @return [type]      [description]
		 */
		protected function query($sql){
			$this->res=mysql_query($sql,$this->linkID);
			return $this->res;
		}

		/**
		 * 获取数组
		 * @param  [type] $sql [description]
		 * @return [type]      [description]
		 */
		public function getRow($sql){
			if($this->query($sql))
			{
				$arr=array();
				while($rows=mysql_fetch_array($this->res)){
					$arr[]=$rows
				}
				return $arr;
			}
			
		}
	
	}

?>