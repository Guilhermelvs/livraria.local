<!DOCTYPE html>
<html>
<body>

<?php
  require_once("../Conexao/Conexao.php");
  require_once("RepositorioLivros.php");

  $Cod_uni = $_POST[ 'cascata' ];  
  //---------------------------------------------------
  $conexao = new MySQL();
  $repositorio = new RepositorioLivros($conexao);
	
  $Livros = $repositorio->getIterator();
  
  foreach($Livros as $Livros){
	if ($Livros['Id_livro']==$Id_livro){
		$Nome = ($Livros['Nome']);
		$Id_livro = utf8_encode($Livros['Id_livro']);
	    $Genero = ($Livros['Genero']);
		$Nome_editora = utf8_encode($Livros['Nome_editora']);
		$Preco = utf8_encode($Livros['Preco']);
		break;
	}
  }
  //---------------------------------------------------	
?>
	
<p>* Campos obrigat&oacute;rios.</p>

<form action="ConsultarAtualizarLivrosNegocio2.php">
  <input type="hidden" name="Id" value="<?php echo $Id;?>">
  Nome *:<br>
  <input type="text" name="Nome" size="80" value="<?php echo $Nome;?>">
  <br>
  Código do livro *:<br>
  <input type="number" min="1" max="50000" name="Cod_uni" value="<?php echo $Id_livro;?>">
  <br>
  Genero *:<br>
   <input type="text" name="Genero" size="80" value="<?php echo $Genero;?>">
  <br>
  Editora *:<br>
  <input type="number" min="1" max="50000" name="Nome_editora" value="<?php echo $Nome_editora;?>">
  <br>
  Preço *:<br>
  <input type="number" min="1" max="50000" name="Preco" value="<?php echo $Preco;?>">
  <br>
  <br>
  <input type="submit" value="Atualizar">
</form> 


</body>
</html>