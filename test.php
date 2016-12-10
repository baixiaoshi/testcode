<?php

abstract class Demo1
{
	protected static $name = 'baixiaoshi';
    private static $names = "hurong";

    private $test_pull_all = "test_pull_all_1";
	public function get_name_fanglei()
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
