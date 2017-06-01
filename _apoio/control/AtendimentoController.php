<?php
require_once(dirname(dirname(__FILE__)) . '/autoload.php');
ProtectSystem(basename(__FILE__));

class AtendimentoController extends Atendimento
{
	/**
	 *  @method insertController Atendimento
	 *  @param array $data
	 *  @category insertDB
	 *  @version 1.0
	 */
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

	/**
	 *  @method updateController Atendimento
	 *  @param int $id, array $data
	 *  @category updateDB
	 *  @version 1.0
	 */
	public function updateController(int $id, array $data)
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

	/**
	 *  @method deleteController Atendimento
	 *  @param int $id
	 *  @category deleteDB
	 *  @version 1.0
	 */
	public function deleteController($id)
	{
		// define > id
		$this->valuePrimaryKey = $id;

		// execute
		$this->deleteDB($this);
	}

}