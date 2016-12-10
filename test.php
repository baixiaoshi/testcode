<?php

abstract class Demo1
{
	protected static $name = 'baixiaoshi';
    private static $names = "hurong";
    private static $ages = 25;


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

$test_pull_2 = "test_pull_2";
?>
