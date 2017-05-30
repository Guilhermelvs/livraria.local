<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioCadastro.php");
	
	$Nome = utf8_decode($_POST[ 'Nome' ]);	
	$Email = utf8_decode($_POST[ 'Email' ]);
	$CPF_Cliente = $_POST[ 'CPF_Cliente' ];
	$End_cliente = $_POST[ 'End_cliente' ];
	$Tel_cliente = $_POST[ 'Tel_cliente' ];
		
	$conexao = new MySQL();
	$repositorio = new RepositorioCadastro($conexao);

	$msg = $repositorio->atualizar($Nome,$Email,$CPF_Cliente,$End_cliente,$Tel_cliente);

	header('Location: http://localhost/rotaonibus_simplificada_v3/Cadastro/GuiaExternaConsultarAtualizarCadastro.php');
?>
