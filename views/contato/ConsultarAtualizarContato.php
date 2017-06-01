<!DOCTYPE html>
<html>
<body>

<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioContatophp");

	$conexao = new MySQL();
	$repositorio = new RepositorioContato($conexao);

	$Contato = $repositorio->getIterator();
?>
<p>* Campos obrigatórios.</p>

<form action="GuiaExternaConsultarAtualizarContatoNegocio.php">
	Nome *:<br>
	<?php
	echo '<select name="cascata">';
	foreach($Contato as $Contato){
    $Id = $Contato['Id'];
		$Nome = $Contato['Nome'];
		$Email = $Contato['Email'];
    $Assunto = $Contato['Assunto'];
    $Mensagem = $contato['Assunto'];

		echo '<option value='.$Id.'>'.$Id.'-'.utf8_encode($Nome).'</option>';
	}
	echo '</select>';
	?>
    <br>
    <br>
    <input type="submit" value="Consultar e Atualizar">
</form>
</body>
</html>
