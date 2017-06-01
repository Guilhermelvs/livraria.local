<?php
		/**
		 * Repositorio de Contato
		 *
		 * @author  Sidney Lima
		 * @version 1.0
		 * @since   30/11/2008
		 */

	class RepositorioContato{

			private $tabelaContato;

			/**
			 * Construtor do Reposit�rio
			 *
			 * @version 1.0
			 */
			function __construct($conexao)
			{
        		$this->tabelaContato          =        "Contato";
				$conexao->conectar();
			}

		    /**
			 * Funcao inserir
			 *
			 * @version 1.0
			 */
			public function inserir($Nome, $Email, $Assunto, $Mensagem)
			{

				$sql = "INSERT INTO `$this->tabelaContato` ($Nome, $Email, $Assunto, $Mensagem) VALUES ('$Nome, $Email, $Assunto, $Mensagem')";

				$result = mysql_query($sql);
				//echo $result;

				$msg = "";

				if($result!=1){
					$msg = "Esse(a) C�digo j� est� registrado(a). Ele(a) n�o pode ser registrado!";
				}
				else{
					$msg = "O c�digo foi registrado com sucesso";
				}
				return $msg;
			}

			/**
			 * Funcao remover
			 *
			 * @version 1.0
			 */
         	public function remover($Id)
			{

				$sql	                = "DELETE FROM `$this->tabelaContato` WHERE Id = '$Id'";
				$resultado              = mysql_query($sql);
				if(mysql_affected_rows()>0)  return true;
				else return false;
			}
			/**
			 * Funcao atualizar
			 *
			 * @version 1.0
			 */
			public function atualizar($Nome, $Email, $Assunto, $Mensagem)
			{

				$sql = "UPDATE `$this->tabelaContato`
				SET Nome= 'Nome'=$Nome, 'Email'=$Email, 'Assunto'=$Assunto, 'Mensagem'=$Mensagem";

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
			$query = "SELECT * FROM `$this->tabelaContato` ORDER BY Id";

			$resultado = mysql_query($query);

			$vetorContato = [];
			while ($linha = mysql_fetch_array($resultado)) {
				  $vetorContato[$j]['Id']					= $linha['Id'];
				 	$vetorContato[$j]['Nome']           = $linha['Nome'];
				 	$vetorContato[$j]['Email']              = $linha['Email'];
				 	$vetorContato[$j]['Assunto']					= $linha['Assunto'];
					$vetorContato[$j]['Mensagem']					= $linha['Mensagem'];
				 	$j++;
				 }
				 return $vetorContato;

			}
		}

		 //********* Testa Repositorio***************

         /*require_once("../Conexao/Conexao.php");
	     $conexao = new MySQL();

	     $repositorio = new RepositorioContato($conexao);
		 //**********testa getIterator()***************
	     $Contatos = $repositorio->getIterator();

	     foreach($Contatos as $Contato){
			printf("%s, %s, %s, %s, %s<br/>",
			$Contato['Id'],
			utf8_encode($Contato['Nome']),
			$Contato['endereco_numero'],
			utf8_encode($Contato['endereco_rua']),
			$Contato['empregado_CPF'] );
		 }*/

		 //**********testa atualizar()***************
	     /*$index = 0;
		 echo $repositorio->atualizar(
		 $Contatos[$index]['Id'],
		 $Contatos[$index]['Nome'],
		 $Contatos[$index]['endereco_numero'],
		 "Rua Navegantes",
		 $Contatos[$index]['empregado_CPF']);*/

		 //**********testa inserir()***************
		 /*$repositorio->inserir(
		 "Did�tico",
		 23,
		 "Rua do Futuro",
		 "0621335597");*/

		 //**********testa remover()***************
	     //$repositorio->remover(154);

?>
