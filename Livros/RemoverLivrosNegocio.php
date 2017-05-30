<!DOCTYPE html>
<html>
<body>

<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioLivros.php");
	
	$Id_livro = $_POST[ 'cascata' ];	
	
	$conexao = new MySQL();
	$repositorio = new RepositorioLivros($conexao);

	$erro = $repositorio->remover($Id_livro);
	
	header('Location: http://localhost/rotaonibus_simplificada_v3/Livros/GuiaExternaRemoverLivros.php');
?>
