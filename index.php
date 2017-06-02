<?php
	require_once('functions.php');
	require_once('autoload.php');

	// capturar a url do navegador
	$url = $_SERVER['REQUEST_URI'];
	$prepare = explode('/', $url);

	// posição da url
	$module_pos = 2;
	$action_pos = 3;

	// validar
	if(count($prepare) > $module_pos){
		if($prepare[$module_pos] != NULL) $module = $prepare[$module_pos]; else $module = 'principal';

		if(count($prepare) > $action_pos){
			if($prepare[$action_pos] != NULL){
				$prepare_action = explode('?', $prepare[$action_pos]);

				$action = $prepare_action[0];
			} else{
				$action = 'index';
			}
		} else {
			$action = 'index';
		}
	} else {
		$module = 'principal';
		$action = 'index';
	}

	// carregar template
	load_template($module, $action);
?>
