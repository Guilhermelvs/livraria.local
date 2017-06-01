<?php
		/**
		 * Repositorio de Cadastro
		 * 
		 * @author  Sidney Lima
		 * @version 1.0
		 * @since   30/11/2008
		 */
	
	class RepositorioCadastro{
			
			private $tabelaCadastro;

			/**
			 * Construtor do Repositório
			 * 
			 * @version 1.0
			 */
			function __construct($conexao)
			{
        		$this->tabelaCadastro          =        "Cadastro";
				$conexao->conectar();
			}
		    
		    /**
			 * Funcao inserir
			 * 
			 * @version 1.0
			 */
			public function inserir($Nome, $Email, $CPF_cliente,$End_cliente,$Tel_cliente)
			{

				$sql = "INSERT INTO `$this->tabelaCadastro` (Nome, Email,CPF_cliente,End_cliente,Tel_cliente) VALUES ('$Nome', '$Email', '$CPF_cliente,$End_cliente,$Tel_cliente')";

				$result = mysql_query($sql);
				//echo $result;
				
				$msg = "";

				if($result!=1){
					$msg = "Esse(a) Cliente já; está; registrado(a). Ele(a) não pode se registrar novamente!";
				}
				else{
					$msg = "O cadastro do Cliente foi realizado com sucesso";
				}
				return $msg;			
			}
			
			/**
			 * Funcao remover
			 * 
			 * @version 1.0
			 */
         	public function remover($CPF_cliente)
			{
				
				$sql	                = "DELETE FROM `$this->tabelaCadastro` WHERE $CPF_cliente = '$CPF_cliente'";
				$resultado              = mysql_query($sql);
				if(mysql_affected_rows()>0)  return true;
				else return false;
			}			
			/**
			 * Funcao atualizar
			 * 
			 * @version 1.0
			 */
			public function atualizar($Nome, $Email, $CPF_cliente,$End_cliente,$Tel_cliente)
			{
		
				$sql =  "UPDATE `$this->tabelaCadastro` 
				SET Nome='$Nome', Email='$Email', CPF_cliente='$CPF_cliente, End_cliente=$End_cliente, Tel_cliente=$Tel_cliente' WHERE CPF_cliente='$CPF_cliente'";

				$result = mysql_query($sql);
				return $result;		
			}
						
			/**
			 * Funcao getIterator
			 * 
			 * @version 1.0
			 */
		    public function getIterator()
			{

			$j=0;
			$query = "SELECT * FROM `$this->tabelaCadastro` ORDER BY $CPF_cliente";

			$resultado = mysql_query($query);

			$vetorCadastro = [];
			while ($linha = mysql_fetch_array($resultado)) {
				 	$[$j]['Nome']           = $linha['Nome'];
				 	$vetorCadastro[$j]['Email']					= $linha['Email'];
					$vetorCadastro[$j]['CPF_cliente']					= $linha['CPF_cliente'];
					$vetorCadastro[$j]['End_cliente']					= $linha['End_cliente'];	
					$vetorCadastro[$j]['Tel_cliente']					= $linha['Tel_cliente'];					
				 	$j++;
				 }
				 return $vetorCadastro;

			}
		}
		
		 //********* Testa Repositorio***************

         /*require_once("../Conexao/Conexao.php");
	     $conexao = new MySQL();
	
	     $repositorio = new RepositorioCadastro($conexao);
		 //**********testa getIterator()*************** 
	     $Cadastros = $repositorio->getIterator();	

	     foreach($Cadastros as $Cadastro){	
			printf("%s, %s, %s, %s, %s<br/>",
			$Cadastro['Id'], 
			utf8_encode($Cadastro['Nome']), 
			$Cadastro['endereco_numero'], 
			utf8_encode($Cadastro['endereco_rua']), 
			$Cadastro['empregado_CPF'] );
		 }*/
		 
		 //**********testa atualizar()***************
	     /*$index = 0;
		 echo $repositorio->atualizar(
		 $Cadastros[$index]['Id'],
		 $Cadastros[$index]['Nome'],
		 $Cadastros[$index]['endereco_numero'],
		 "Rua Navegantes",
		 $Cadastros[$index]['empregado_CPF']);*/
		
		 //**********testa inserir()***************
		 /*$repositorio->inserir(
		 "Didático", 
		 23, 
		 "Rua do Futuro", 
		 "0621335597");*/
		  
		 //**********testa remover()***************
	     //$repositorio->remover(154);
			
?>
			