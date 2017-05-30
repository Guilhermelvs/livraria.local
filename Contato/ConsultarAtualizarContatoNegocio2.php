<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioContato.php");

	$Id = $_POST[ 'Id' ];
	$Nome = utf8_decode($_POST[ 'Nome' ]);
	$Email= utf8_decode($_POST[ 'Email' ]);
  $Assunto = utf8_decode($_POST[ 'Assunto' ]);
  $Mensagem = utf8_decode($_POST[ 'Mensagem' ]);

	$conexao = new MySQL();
	$repositorio = new RepositorioContato($conexao);

	$msg = $repositorio->atualizar(Id,$Nome,$Email,$Assunto,$Mensagem);

	header('Location: http://localhost/rotaonibus_simplificada_v3/Contato/GuiaExternaConsultarAtualizarContato.php');
?>
