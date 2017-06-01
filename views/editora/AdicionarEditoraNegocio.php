.<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioEditora.php");
	require_once("RegraEditora.php");
	
	$nome = $_POST[ 'nome' ];	
	$Cod_editora = $_POST[ 'Cod_editora' ];
	$Telefone = $_POST[ 'Telefone' ];
	$Endereco = $_POST[ 'Endereco' ];
	
	$regra = new RegraEditora();
	$retorno = $regra->validaCod($Cod);
	
	$msg = "";
	if ($retorno==false){
		$msg = "O cadastro da Editora foi cancelado. O código ".$Cod." é inválido!";
	}
	else{
		$conexao = new MySQL();
		$repositorio = new RepositorioEditora($conexao);
		$msg = $repositorio->inserir($nome,$Cod_editora,$telefone,$Endereco);
	}
	header('Location: http://localhost/rotaonibus_simplificada_v3/Editora/GuiaExternaAdicionarEditora.php?msg='.$msg);
?>


