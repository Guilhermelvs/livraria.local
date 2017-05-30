<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioCadastro.php");
	require_once("RegraCadastro.php");
	
	$nome = $_POST[ 'nome' ];	
	$CPF_Cliente = $_POST[ 'CPF_Cliente' ];
	$Email = $_POST['Email'];
	$Tel_cliente = $_POST[ 'Tel_cliente' ];
    $End_cliente = $_POST[ 'End_cliente'];	
	$regra = new RegraCadastro();
	$retorno = $regra->validaCPF($Cliente);
	
	$msg = "";
	if ($retorno==false){
		$msg = "O cadastro do departamento foi cancelado. O CPF ".$Cliente." é inválido!";
	}
	else{
		$conexao = new MySQL();
		$repositorio = new RepositorioCadastro($conexao);
		$msg = $repositorio->inserir($nome,$SEmail,$CPF_Cliente,$Tel_cliente,$End_cliente);
	}
	header('Location: http://localhost/rotaonibus_simplificada_v3/Cadastro/GuiaExternaAdicionarCadastro.php?msg='.$msg);
?>


