<?php
require_once(dirname(dirname(__FILE__)) . '/autoload.php');
ProtectSystem(basename(__FILE__));

abstract class Base extends ConnectDB
{
	// variables
	public $page_title = null;
	public $table_prefix = 'ouvidoria_';
	public $table_name = '';
	public $table_log = true;
	public $table_log_name = '';
	public $columnPrimaryKey = null;
	public $valuePrimaryKey = null;
	public $columns = array();
	public $extraSelect = '';

	// add
	public function addColumn($column=null, $value=null)
	{
		if($column != null) $this->columns[$column] = $value;
	}

	// del
	public function delColumn($column=null)
	{
		if(array_key_exists($column, $this->columns) != null) unset($this->columns[$column]);
	}

	// set
	public function setValue($column=null, $value=null)
	{
		if(($column != null) and ($value != null)) $this->columns[$column] = $value;
	}

	// get
	public function getValue($column=null)
	{
		if(($column != null) and (array_key_exists($column, $this->columns) != null)){
			return $this->columns[$column];
		} else {
			return FALSE;
		}
	}
}