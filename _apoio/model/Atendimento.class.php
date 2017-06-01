<?php
require_once(dirname(dirname(__FILE__)) . '/autoload.php');
ProtectSystem(basename(__FILE__));

class Atendimento extends Base
{
	public function __construct($columns=array())
	{
		parent::__construct();
		$this->table_name = 'atendimento';
		$this->table_log = false;

		if(sizeof($columns) <= 0){
			$this->columns = array(
					"idReinvidicacao"  => null,
					"protocolo"        => null,

					"info_nome"        => null,
					"info_cpf"         => null,
					"info_telefone"    => null,
					"info_celular"     => null,
					"info_email"       => null,

			        "info_estado"      => null,
					"info_bairro"      => null,
					"info_cep"         => null,
					"info_endereco"    => null,
					"info_numero"      => null,
					"info_complemento" => null,

					"info_ocupacao"    => null,
					"forma_contato"    => null,
					"numero_cress"     => null,
					"assunto"          => null,
					"texto"            => null,
					"tipo"             => null,

					"data_abertura"    => date('Y-m-d H:i:s'),
					"data_fechamento"  => null,
			        "flag"             => 1,
			        "status"           => 1,
			        "deletado"         => 1
			);
		} else {
			$this->columns = $columns;
		}

		$this->columnPrimaryKey = "idAtendimento";
	}
}