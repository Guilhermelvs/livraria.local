<!DOCTYPE html>
<html>
<body>

<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioEditora.php");
	
	$conexao = new MySQL();
	$repositorio = new RepositorioEditora($conexao);
	
	$Editora = $repositorio->getIterator();	
?>
<p>* Campos obrigatórios.</p>

<form action="RemoverEditoraNegocio.php?Genero=$'Genero'">
	Nome *:<br>
	<?php
	echo '<select name="cascata">';
	foreach($Editora as $Editora){
		$Cod_editora = $Editora['Cod_editora'];
		$Nome = $Editora['Nome'];		
		echo '<option value='.$Cod.'>'.$Cod.'-'.utf8_encode($Nome).'</option>';
	}
	echo '</select>';
	?>
    <br>
    <br>
    <input type="submit" value="Remover">
</form> 
</body>
</html>