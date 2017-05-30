<!DOCTYPE html>
<html>
<body>

<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioCadastro.php");
	
	$Id = $_POST[ 'cascata' ];	
	
	$conexao = new MySQL();
	$repositorio = new RepositorioCadastro($conexao);

	$erro = $repositorio->remover($Id);
	
	header('Location: http://localhost/rotaonibus_simplificada_v3/Cadastro/GuiaExternaRemoverCadastro.php');
?>
