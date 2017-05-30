<!DOCTYPE html>
<html>
<body>

<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioCadastro.php");
	
	$conexao = new MySQL();
	$repositorio = new RepositorioCadastro($conexao);
	
	$Cliente = $repositorio->getIterator();	
?>
<p>* Campos obrigatórios.</p>

<form action="GuiaExternaConsultarAtualizarCadastroNegocio.php">
	Nome *:<br>
	<?php
	echo '<select name="cascata">';
	foreach($Cliente as $Cliente){
		$CPF_Cliente = $Cliente['CPF_Cliente'];
		$Nome = $Cliente['Nome'];		
		echo '<option value='.$CPF_Cliente.'>'.$CPF_Cliente.'-'.utf8_encode($Nome).'</option>';
	}
	echo '</select>';
	?>
    <br>
    <br>
    <input type="submit" value="Consultar e Atualizar">
</form> 
</body>
</html>