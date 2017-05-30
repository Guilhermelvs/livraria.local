<!DOCTYPE html>
<html>
<body>

<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioContato.php");
	
	$ID = $_POST[ 'cascata' ];	
	
	$conexao = new MySQL();
	$repositorio = new RepositorioContato($conexao);

	$erro = $repositorio->remover($Id);
	
	header('Location: http://localhost/rotaonibus_simplificada_v3/Contato/GuiaExternaRemoverContato.php');
?>
