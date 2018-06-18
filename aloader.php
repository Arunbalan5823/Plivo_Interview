<?php
require_once(__DIR__.'/config/config.php');




function __autoload($class_name)
{
	$class_name = explode("\\", $class_name);
	if(!empty($class_name[2]) && file_exists(str_replace('\\', '/', CONTROLLERS).'/'.$class_name[2] . '.php'))
		require_once(str_replace('\\', '/', CONTROLLERS).'/'.$class_name[2] . '.php');
}