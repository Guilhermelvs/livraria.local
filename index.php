<?php
	require_once('functions.php');
	require_once('autoload.php');

	// capturar a url do navegador
	$url = $_SERVER['REQUEST_URI'];
	$prepare = explode('/', $url);

	// validar
	if(count($prepare) > MODULE_POS){
		if($prepare[MODULE_POS] != NULL) $module = $prepare[MODULE_POS]; else $module = 'principal';

		if(count($prepare) > ACTION_POS){
			if($prepare[ACTION_POS] != NULL){
				$prepare_action = explode('?', $prepare[ACTION_POS]);

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
