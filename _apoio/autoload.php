<?php

// define > path > file
$path_local = dirname(__FILE__);

// load > functions
require_once('functions.php');

// autoload > model > class
function __autoload($model)
{
	// prepare > classname
	$classModel = str_replace('Controller', '', $model);
	$classController = str_replace('..', '', $model);

	// load > class
	require_once(dirname(__FILE__) . '/' . MODEL_PATH . '/' . $classModel . '.class.php');

	if(file_exists(dirname(__FILE__) . '/' . CONTROL_PATH . '/' . $classController . '.php')){
		require_once(dirname(__FILE__) . '/' . CONTROL_PATH . '/' . $classController . '.php');
	}


}
