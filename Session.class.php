<?php
// +----------------------------------------------------------------------
// | Author: lion  qq：623832632@qq.com
// +----------------------------------------------------------------------
class Session
{	
	private static $db;
	private static $tbname;
	private static $expire = 1440;

	public function __construct($db,$tbname)
	{	
		ini_set('session.save_handler','user');//自定义session处理方式
		self::$db = $db;
		self::$tbname = $tbname;
	}

	//-----------------------------------
	//
	//
	public static function sesion()
	{	
		//这一句可能有错误
		session_set_save_handler(
			array($this,'open'), 
			array($this,'close'), 
			array($this,'read'), 
			array($this,'write'), 
			array($this,'destroy'), 
			array($this,'gc')
			);

	}


	public static function open($savePath,$sname)
	{
		return true;
	}

	public static function close()
	{
		return true;
	}

	/**
	 * 1.删除过期的session
	 * 2.读取session
	 * @param  [type] $sid [description]
	 * @return [type]      [description]
	 */
	public function read($sid)
	{
		$sql = "delete from ".$this->tbname." where `last_time`<".(time()-intval($this->expire));
		$this->db->query($sql);//删除过期的额session
		$sql = "select sdata from ".$this->tbname." where `skey`=".$sid." limit 1";
		$res = $this->db->getOne($sql);
		return $res['sdata'];
	}
	
	public function write($sid,$sdata)
	{	
		$sql = "insert into ".$this->tbname."('".$sid."','".$sdata."','".$this->expire."','".time()."','".$_SERVER['REMOTE_ADDR']."')";
		$this->db->query($sql);

	}

	public function destroy($sid)
	{
		$sql = "delete from ".$this->tbname." where skey='{$sid}'";
		$this->db->query($sql);//删除过期的额session
	}

	public function gc()
	{
		return true;
	}
}

?>