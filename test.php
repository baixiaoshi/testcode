<?php

abstract class Demo
{
	protected static $name = 'baixiaoshi';
    private static $names = "hurong";
    private static $ages = 25;
    private $test_pull_all = "test_pull_all_1";
	public function get_name_fanglei()
	public function get_name_hurong()
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

$test_fetch_1 = "test_fetch_1";
?>
