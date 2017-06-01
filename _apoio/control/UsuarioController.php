<?php
require_once(dirname(dirname(__FILE__)) . '/autoload.php');
ProtectSystem(basename(__FILE__));

class UsuarioController extends Usuario
{
	// do > login
	public function doLogin($object)
	{
		$object->extraSelect = 'WHERE login_user="' . $object->getValue('login_user') . '"';
		$this->selectDB($object);
		
		if($this->row == 1){
			$user = $this->dataReturn();
			
			$find['user'] = true;
			
			$object->extraSelect = 'WHERE login_user="' . $object->getValue('login_user') . '" AND login_password="'. $object->getValue('login_password') . '"';
			$this->selectDB($object);
			
			if($this->row == 1){
				$this->columnPrimaryKey = $user->idUsuario;
				
				$find['pass'] = true;
				
				return $find;
			} else {
				 
				$find['pass'] = false;
				
				return $find;
			}
		} else {
			$find['user'] = false;
			$find['pass'] = false;
			
			return $find;
		}
	}
	
	// do > logout
	public function doLogout()
	{
		$session = new Session();
		$session->destroy(TRUE);
		Redirect('?error=1');
	}
	
	public function ValideRecord($column=NULL, $value=NULL)
	{
		if($column != NULL and $value != NULL){
			is_numeric($value) ? $value = $value : $value = "'" . $value . "'";
			
			$this->extraSelect = "WHERE " . $column ."=" . $value;
			$this->selectDB($this);
			
			if($this->row > 0){
				return true;
			} else {
				return false;
			}
		} else {
			$this->errorManager(__FILE__, __FUNCTION__, NULL, 'Faltam parâmetros para executar a função', TRUE);
		}
	}
	
	// insert > cliente
	public function insertController(array $data)
	{
		// define > columns
		for($i=0; $i < count($data); $i++){
			$this->setValue(key($data), $data[key($data)]);
			next($data);
		}

		// execute
		$this->insertDB($this);
	}
	
	// update > cliente
	public function updateController($id, array $data)
	{
		// define > id
		$this->valuePrimaryKey = $id;
		
		// define > columns
		for($i=0; $i < count($data); $i++){
			$this->setValue(key($data), $data[key($data)]);
			next($data);
		}
		
		// execute
		$this->updateDB($this);
	}
	
	// delete > cliente
	public function deleteController($id)
	{
		// define > id
		$this->valuePrimaryKey = $id;

		// execute
		$this->deleteDB($this);
	}
}