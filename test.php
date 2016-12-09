<?php

abstract class Demo
{
	protected static $name = 'baixiaoshi';


<<<<<<< Updated upstream
	public function get_name_fanglei()
=======
	public function get_name_hurong()
>>>>>>> Stashed changes
	{
		echo static::$name;
        print_r("fanglei");
	}
}

class Mydemo extends Demo
{	
    echo 'baixiaoshi';
	//parent::get_name();
}

?>
