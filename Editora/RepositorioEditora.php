<?php
		/**
		 * Repositorio de Editora
		 * 
		 * @author  Sidney Lima
		 * @version 1.0
		 * @since   30/11/2008
		 */
	
	class RepositorioEditora{
			
			private $tabelaEditora;

			/**
			 * Construtor do Repositório
			 * 
			 * @version 1.0
			 */
			function __construct($conexao)
			{
        		$this->tabelaEditora          =        "Editora";
				$conexao->conectar();
			}
		    
		    /**
			 * Funcao inserir
			 * 
			 * @version 1.0
			 */
			public function inserir($Nome, $Cod_editora,$Telefone,$Endereco)
			{

				$sql = "INSERT INTO `$this->tabelaEditora` (Nome, Cod_editora,$telefone,$Endereco) VALUES ('$Nome','$Cod_editora,$telefone,$Endereco')";

				$result = mysql_query($sql);
				//echo $result;
				
				$msg = "";

				if($result!=1){
					$msg = "Essa Editora já; está; registrada. Ela não pode ter mais de um registro!";
				}
				else{
					$msg = "O cadastro da Editora foi realizado com sucesso";
				}
				return $msg;			
			}
			
			/**
			 * Funcao remover
			 * 
			 * @version 1.0
			 */
         	public function remover($Genero)
			{
				
				$sql	                = "DELETE FROM `$this->tabelaEditora` WHERE Cod_editora = '$Cod_editora'";
				$resultado              = mysql_query($sql)
				if(mysql_affected_rows()>0)  return true;
				else return false;
			}			
			/**
			 * Funcao atualizar
			 * 
			 * @version 1.0
			 */
			public function atualizar($Nome, $Cod_editora,$Telefone,$Endereco)
			{
		
				$sql =  "UPDATE `$this->tabelaEditora` 
				SET Nome='$Nome',Cod_editora='$Cod_editora,Endereco='$Endereco','Telefone='$Telefone','WHERE Cod_editora='$Cod_editora'";

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
			$query = "SELECT * FROM `$this->tabelaEditora` ORDER BY Nome";

			$resultado = mysql_query($query);

			$vetorEditora = [];
			while ($linha = mysql_fetch_array($resultado)) {
				 	$vetorEditora[$j]['Nome']           = $linha['Nome'];
				 	$vetorEditora[$j]['Cod_editora']              = $linha['Cod_editora'];
					$vetorEditora[$j]['Endereco']              = $linha['Endereco'];
					$vetorEditora[$j]['Telefone']              = $linha['Telefone'];
				 	$j++;
				 }
				 return $vetorEditora;

			}
		}
		
		 //********* Testa Repositorio***************

         /*require_once("../Conexao/Conexao.php");
	     $conexao = new MySQL();
	
	     $repositorio = new RepositorioEditora($conexao);
		 //**********testa getIterator()*************** 
	     $Editoras = $repositorio->getIterator();	

	     foreach($Editoras as $Editora){	
			printf("%s, %s, %s, %s, %s<br/>",
			$Editora['Id'], 
			utf8_encode($Editora['Nome']), 
			$Editora['endereco_numero'], 
			utf8_encode($Editora['endereco_rua']), 
			$Editora['empregado_CPF'] );
		 }*/
		 
		 //**********testa atualizar()***************
	     /*$index = 0;
		 echo $repositorio->atualizar(
		 $Editoras[$index]['Id'],
		 $Editoras[$index]['Nome'],
		 $Editoras[$index]['endereco_numero'],
		 "Rua Navegantes",
		 $Editoras[$index]['empregado_CPF']);*/
		
		 //**********testa inserir()***************
		 /*$repositorio->inserir(
		 "Didático", 
		 23, 
		 "Rua do Futuro", 
		 "0621335597");*/
		  
		 //**********testa remover()***************
	     //$repositorio->remover(154);
			
?>
			