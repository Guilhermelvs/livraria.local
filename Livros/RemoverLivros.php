<!DOCTYPE html>
<html>
<body>

<?php

    require_once("../Conexao/Conexao.php");
	require_once("RepositorioLivros.php");
	
	$conexao = new MySQL();
	$repositorio = new RepositorioLivros($conexao);
	
	$Livros = $repositorio->getIterator();	
?>
<p>* Campos obrigat&oacute;rios.</p>

<form action="RemoverLivrosNegocio.php?Id_livro='$Id_livro'">
	Nome *:<br>
	<?php
	echo '<select name="cascata">';
	foreach($Livros as $Livros){
		$Id_livro = $Livros['Id_livro'];
		$Nome = $Livros['Nome'];		
		echo '<option value='.$Id_livro.'>'.$Id_livro.'-'.utf8_encode($Nome).'</option>';
	}
	echo '</select>';
	?>
    <br>
    <br>
    <input type="submit" value="Remover">
</form> 
</body>
</html>