<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioEditora.php");
	
	$Cod = $_POST[ 'Cod' ];
	$Nome = utf8_decode($_POST[ 'Nome' ]);	
	$Cod_editora = $_POST[ 'Cod_editora' ];
	$Telefone = $_POST[ 'Telefone' ];
	$Endereco= $_POST[ 'Endereco' ];
		
	$conexao = new MySQL();
	$repositorio = new RepositorioEditora($conexao);

	$msg = $repositorio->atualizar($Nome,$Cod_editora,$Telefone,$Endereco);

	header('Location: http://localhost/rotaonibus_simplificada_v3/Editora/GuiaExternaConsultarAtualizarEditora.php');
?>
