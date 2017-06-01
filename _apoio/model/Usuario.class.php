<?php
require_once(dirname(dirname(__FILE__)) . '/autoload.php');
ProtectSystem(basename(__FILE__));

class Usuario extends Base
{
	public function __construct($columns=array())
	{
		parent::__construct();
		$this->table_name = 'usuario';
		
		if(sizeof($columns) <= 0){
			$this->columns = array(
					"nome" => NULL,
					"email" => NULL,
					"login_user" => NULL,
					"login_password" => NULL,
					"administrador" => NULL
			);
		} else {
			$this->columns = $columns;
		}
		
		$this->columnPrimaryKey = "idUsuario";
	}
}