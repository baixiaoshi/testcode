<?php

abstract class Demo
{
	protected static $name = 'baixiaoshi';


	public function get_name()
	{
		echo static::$name;
	}
}

class Mydemo extends Demo
{	
    echo 'baixiaoshi';
	//parent::get_name();
}

?>
