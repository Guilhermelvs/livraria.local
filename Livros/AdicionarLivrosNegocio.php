<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioLivros.php");
	require_once("RegraLivros.php");
	
	$nome = $_POST[ 'nome' ];	
	$Id_livro = $_POST[ 'Id_livro' ];
	$Genero = $_POST[ 'Genero' ];
	$Nome_editora = $_POST[ 'Nome_editora' ];
	$Preco = $_POST[ 'Preco' ];
	
	$regra = new RegraLivros();
	$retorno = $regra->validaCod($Id_livro);
	
	$msg = "";
	if ($retorno==false){
		$msg = "O busca pelo livro foi cancelada. O codigo ".$Id_livro." está inválido!";
	}
	else{
		$conexao = new MySQL();
		$repositorio = new RepositorioLivros($conexao);
		$msg = $repositorio->inserir($nome,$Id_livro,$Genero,$Nome_editora,$Preco);
	}
	header('Location: http://localhost/rotaonibus_simplificada_v3/Livros/GuiaExternaAdicionarLivros.php?msg='.$msg);
?>


