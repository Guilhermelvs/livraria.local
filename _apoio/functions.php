<?php
start_system();

function start_system()
{
	if(file_exists(dirname(__FILE__) . '/config.php')){
		require_once(dirname(__FILE__) . '/config.php');
	} else {
		die('O arquivo de configuração não foi localizado!');
	}
	
	$const = array ('BASE_URL', 'ADM_URL', 'BASE_PATH', 'CONTROL_PATH', 'MODEL_PATH', 'VIEW_PATH', 'CSS_PATH', 'JS_PATH', 'DB_HOST', 'DB_USER', 'DB_PASS', 'DB_NAME');
	
	foreach($const as $c){
		if(!defined($c)){
			die('Constante não definida: ' . $c);
		}
	}
	
	require_once(BASE_PATH . '/autoload.php');
}

function LoadController($controller=NULL, $action=NULL)
{
	if(($controller == NULL) OR ($action == NULL)){
		die('Faltam parametros');
	} else {
		if(file_exists(CONTROL_PATH . $controller . 'Controller.php')){
			include_once(CONTROL_PATH . $controller . 'Controller.php');
		} else {
			die('Controlador não localizado!');
		}
	}
}

function LoadView($view=NULL, $action=NULL)
{
	if(($view == NULL) OR ($action == NULL)){
		die($view . ' - Faltam parametros');
	} else {
		if(file_exists(VIEW_PATH . ucfirst($view) . 'View.php')){
			include_once(VIEW_PATH . ucfirst($view) . 'View.php');
		} else {
			
			die(VIEW_PATH  . $view . 'View.php - View não localizado!');
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

function ProtectSystem($file=NULL, $redirectTo='index.php?error=3')
{
	$url = $_SERVER['PHP_SELF'];
	
	if(preg_match("/$file/i", $url)){
		Redirect($redirectTo);
	}
}

function Redirect($url='')
{
	header('Location: ' . BASE_URL . $url);
}

function ValideSession()
{
	$session = new Session();
	
	if(($session->getNvars() <= 0) or ($session->getVar('logged') != true) or ($session->getVar('ip') != $_SERVER['REMOTE_ADDR'])){
		Redirect('error/3');
	}
}

function isAdmin()
{
	$session = new Session();
	
	$user = new Usuario(array('admin' => null));
}