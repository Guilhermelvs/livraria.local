<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioContato.php");
	require_once("RegraContato.php");

  $Id = $_POST[ 'Id' ];
	$Nome = $_POST[ 'Nome' ];
	$Email = $_POST[ 'Email' ];
	$Assunto = $_POST[ 'Assunto' ];
  $mensagem = $_POST[ 'Mensagem' ];

	$regra = new RegraContato();
	$retorno = $regra->validaId($Contato);

	$msg = "";
	if ($retorno==false){
		$msg = "O Envio foi cancelado. O email ".$Id." está inválido!";
	}
	else{
		$conexao = new MySQL();
		$repositorio = new RepositorioContato($conexao);
		$msg = $repositorio->inserir($Id,$Nome,$Email,$Assunto,$mensagem);
	}
	header('Location: http://localhost/rotaonibus_simplificada_v3/Contato/GuiaExternaAdicionarContato.php?msg='.$msg);
?>
