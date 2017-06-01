<!DOCTYPE html>
<html>
<body>

<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioEditora.php");
	
	$Id = $_POST[ 'cascata' ];	
	
	$conexao = new MySQL();
	$repositorio = new RepositorioEditora($conexao);

	$erro = $repositorio->remover($Cod);
	
	header('Location: http://localhost/rotaonibus_simplificada_v3/Editora/GuiaExternaRemoverEditora.php');
?>
