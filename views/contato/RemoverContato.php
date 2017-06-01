<!DOCTYPE html>
<html>
<body>

<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioContato.php");

	$conexao = new MySQL();
	$repositorio = new RepositorioContato($conexao);

	$Contato = $repositorio->getIterator();
?>
<p>* Campos obrigat&oacute;rios.</p>

<form action="RemoverContatoNegocio.php?Cod_Contato='$Cod_Contato'">
	Nome *:<br>
	<?php
	echo '<select name="cascata">';
	foreach($Contato as $Contato){
		$Nome = $Nome['Nome'];
		$Email = $Email['Email'];
    $Assunto = $Assunto['Assunto'];
    $Mensagem = $Mensagem['Mensagem'];
		echo '<option value='.$Id.'>'.$Id.'-'.utf8_encode($Nome).'</option>';
	}
	echo '</select>';
	?>
    <br>
    <br>
    <input type="submit" value="Remover">
</form>
</body>
</html>
