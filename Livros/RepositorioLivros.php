<?php
		/**
		 * Repositorio de Livros
		 * 
		 * @author  Sidney Lima
		 * @version 1.0
		 * @since   30/11/2008
		 */
	
	class RepositorioLivros{
			
			private $tabelaLivros;

			/**
			 * Construtor do Repositório
			 * 
			 * @version 1.0
			 */
			function __construct($conexao)
			{
        		$this->tabelaLivros          =        "livros";
				$conexao->conectar();
			}
		    
		    /**
			 * Funcao inserir
			 * 
			 * @version 1.0
			 */
			public function inserir($Nome,$Id_livro, $Genero, $Nome_editora, $Preco)
			{

				$sql = "INSERT INTO `$this->tabelaLivros` (Nome, Genero, Id_livro, Nome_editora, Preco) VALUES ('$Nome','$Genero', '$Id_livro', '$Nome_editora','$Preco')";

				$result = mysql_query($sql);
				//echo $result;
				
				$msg = "";

				if($result!=1){
					$msg = "Esse(a) Livro já; está; registrado(a). Ele(a) não pode ser registrado novamente!";
				}
				else{
					$msg = "O cadastro do Livro foi realizado com sucesso";
				}
				return $msg;			
			}
			
			/**
			 * Funcao remover
			 * 
			 * @version 1.0
			 */
         	public function remover($Id_livro)
			{
				
				$sql	                = "DELETE FROM `$this->tabelaLivros` WHERE Id_livro= '$Id_livro'";
				$resultado              = mysql_query($sql);
				if(mysql_affected_rows()>0)  return true;
				else return false;
			}			
			/**
			 * Funcao atualizar
			 * 
			 * @version 1.0
			 */
			public function atualizar($Nome, $Genero, $Id_livro, $Nome_editora, $Preco) 
			{
		
				$sql =  "UPDATE `$this->tabelaLivros` 
				SET Nome='$Nome',Genero='$Genero', Id_livro='$Id_livro', Nome_editora='$Nome_editora',Preco='$Preco' WHERE Id_livro='$Id_livro'";

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
			$query = "SELECT * FROM `$this->tabelaLivros` ORDER BY Nome";

			$resultado = mysql_query($query);

			$vetorLivros = [];
			while ($linha = mysql_fetch_array($resultado)) {
				 	$vetorLivros[$j]['Nome']           = $linha['Nome'];
				 	$vetorLivros[$j]['Genero']              = $linha['Genero'];
				 	$vetorLivros[$j]['Id_livro']					= $linha['Id_livro'];
					$vetorLivros[$j]['Nome_editora']					= $linha['Nome_editora'];
					$vetorLivros[$j]['Preco']					= $linha['Preco'];
				 	$j++;
				 }
				 return $vetorLivros;

			}
		}
		
		 //********* Testa Repositorio***************

         /*require_once("../Conexao/Conexao.php");
	     $conexao = new MySQL();
	
	     $repositorio = new RepositorioLivros($conexao);
		 //**********testa getIterator()*************** 
	     $Livross = $repositorio->getIterator();	

	     foreach($Livross as $Livros){	
			printf("%s, %s, %s, %s, %s<br/>",
			$Livros['Id'], 
			utf8_encode($Livros['Nome']), 
			$Livros['endereco_numero'], 
			utf8_encode($Livros['endereco_rua']), 
			$Livros['empregado_CPF'] );
		 }*/
		 
		 //**********testa atualizar()***************
	     /*$index = 0;
		 echo $repositorio->atualizar(
		 $Livross[$index]['Id'],
		 $Livross[$index]['Nome'],
		 $Livross[$index]['endereco_numero'],
		 "Rua Navegantes",
		 $Livross[$index]['empregado_CPF']);*/
		
		 //**********testa inserir()***************
		 /*$repositorio->inserir(
		 "Didático", 
		 23, 
		 "Rua do Futuro", 
		 "0621335597");*/
		  
		 //**********testa remover()***************
	     //$repositorio->remover(154);
			
?>
			