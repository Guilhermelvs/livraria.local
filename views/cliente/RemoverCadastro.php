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

<form action="RemoverCadastroNegocio.php?CPF_cliente='$CPF_cliente'">
	Nome *:<br>
	<?php
	echo '<select name="cascata">';
	foreach($Cliente as $Cliente){
		$CPF_cliente = $Cliente['CPF_cliente'];
		$Nome = $Cliente['Nome'];		
		echo '<option value='.$CPF'.$CPF'.utf8_encode($Nome).'</option>';
	}
	echo '</select>';
	?>
    <br>
    <br>
    <input type="submit" value="Remover">
</form> 
</body>
</html>