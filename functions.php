<?php
start_system();

function start_system()
{
	if(file_exists(dirname(__FILE__) . '/config/config.php')){
		require_once(dirname(__FILE__) . '/config/config.php');
	} else {
		die('O arquivo de configuração não foi localizado!');
	}
}

function load_template($module=NULL, $action=NULL)
{
	if(($module == NULL) OR ($action == NULL)){
		die('load_template -> As variáveis $module e $action não foram definidas!');
	} else {
		if(file_exists('views/index.php')){
			include_once('views/index.php');
		} else {
			die('views/index.php -> Template não localizado!');
		}
	}
}

function load_view($module=NULL, $action=NULL)
{
	if(($module == NULL) OR ($action == NULL)){
		die('load_view -> As variáveis $module e $action não foram definidas!');
	} else {
		if(file_exists('views/' . $module . '/' . $action . '.php')){
			include_once('views/' . $module . '/' . $action . '.php');
		} else {
			die('views/' . $module . '/' . $action . '.php -> View não localizado!');
		}
	}
}

function DateConversor($date=NULL, $lang='EUA', $time=TRUE)
{
	if($date != NULL){
		if($lang == 'EUA'){
			if($time == TRUE){
				$d_t = explode ( " ", $date );

				$d = explode ( "/", $d_t[0] );

				$ok = $d[2] . '-' . $d[1] . '-' . $d[0] . ' ' . $d_t[1];
			} else {
				$d = explode ( "/", $date );

				$ok = $d[2] . '-' . $d[1] . '-' . $d[0];
			}
		} else if($lang == 'BR'){
			if($time == TRUE){
				$d_t = explode (" ", $date);

				$d = explode ("-", $d_t[0]);

				$ok = $d[2] . '/' . $d[1] . '/' . $d[0] . ' às ' . $d_t[1];
			} else {
				$d = explode ("-",  $date);

				$ok = $d[2] . '/' . $d[1] . '/' . $d[0];
			}
		}
		return $ok;
	} else {
		return false;
	}
}

function Redirect($url='')
{
	header('Location: ' . BASE_URL . $url);
}
