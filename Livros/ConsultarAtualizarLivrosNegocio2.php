<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioLivros.php");
	
	$Nome = ($_POST[ 'Nome' ]);	
	$Id_livro = utf8_decode($_POST[ 'Id_livro' ]);
	$Genero = ($_POST[ 'Genero' ]);
	$Nome_editora = utf8_decode($_POST[ 'Nome_editora' ]);
	$Preco = utf8_decode($_POST[ 'Preco' ]);
		
	$conexao = new MySQL();
	$repositorio = new RepositorioLivros($conexao);

	$msg = $repositorio->atualizar($Nome,$Id_livro,$Genero,$Nome_editora,$Preco);

	header('Location: http://localhost/rotaonibus_simplificada_v3/Livros/GuiaExternaConsultarAtualizarLivros.php');
?>
