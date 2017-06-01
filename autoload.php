<?php

// define > path > file
$path_local = dirname(__FILE__);

// autoload > model > class
function __autoload($model)
{
	$path_model = dirname(__FILE__) . '/models/' . $model . '.class.php';

    // load > class
    if(file_exists($path_model)){
        require_once($path_model);
    }
}
