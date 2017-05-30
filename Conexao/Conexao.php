<?php
	/***************************************************************
	/* 	Classe para manipula��o do SGBD
	/*	@version 1.5
	 * 	@author Sidney Lima
	 */

			
	class MySQL{
				//atributos para configura��o do MySQL
				private $banco;
				private $server;
				private $login;
				private $senha;

				//atributos para opera��es com MySQl
				private $con;
				private $sql;

				public function __construct()
				{
					$this->banco  = "Livraria";			//o database do projeto
					$this->server = "localhost";			//endere�o do seu servidor MySQL
					$this->login  = "root";					//login usado no MySQL
					$this->senha  = "";				//senha usadA no MySQL
					$this->conectar();
				}

				public function __destruct()
 			        {
     				       mysql_close($this->con);	//Quando destroi o objeto MySQL Fecha a conex�o
				}

				public function conectar()
				{
					$this->con = mysql_connect($this->server,$this->login,$this->senha);
					mysql_select_db($this->banco, $this->con);

					if(!$this->con)
					{
							throw new Exception('Nao foi poss�vel conectar-se ao servidor do SGBD.');
					}
					elseif (!mysql_select_db($this->banco))
					{
							throw new Exception('N�o foi poss�vel selecionar o Banco de Dados desejado.');
					}
					return true;
			   	}

			  	public function query($sql)	//Funcao para executar um query
			   	{

                                   $q = mysql_query($sql);
                                   if(!$q){ //se ocorrer erro

                                                 throw new Exception('Ocorreu um problema durante a consulta ao banco de dados'); //chama a fun��o erro()
                                                 }
                                   else{ //se n�o ocorrer erro
                                         return $q; //retorna o resultado da pesquisa
                                       }
			   	}
			   	
			   	/* suporte a transa��es */
			   	public function begin()
			   	{
				      mysql_query("START TRANSACTION", $this->con);
				      mysql_query("BEGIN", $this->con);
				}
				
				public function commit()
				{
					mysql_query("COMMIT", $this->con);
				}
				
				public function rollback()
				{
					mysql_query("ROLLBACK", $this->con);
				}
				public function transaction($queries)
				{
					
					$this->begin();
					
					foreach($queries as $qvalue)
					{
						$result = mysql_query($qvalue);
					}
					if (mysql_error())
					{
						$this->rollback();
						throw new Exception('A transa��o n�o pode ser efetuada'); //chama a fun��o erro()
					}	
					else
					{
						$this->commit();
						return true;
					} 
				
				}
			
	}
?>

