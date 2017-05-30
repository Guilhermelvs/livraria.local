<!DOCTYPE html>
<html>
<body>

<?php
  require_once("../Conexao/Conexao.php");
  require_once("RepositorioContato.php");

  $Id = $_POST[ 'cascata' ];
  //---------------------------------------------------
  $conexao = new MySQL();
  $repositorio = new RepositorioContato($conexao);

  $Contato = $repositorio->getIterator();

  foreach($Contato as $Contato){
	if ($Contato['Id']==$Id){
    $Id = utf8_decode($Contato['Id']);
	  $Nome = utf8_encode($Contato['Nome']);
	  $Email = utf8_encode($Contato['Email']);
    $Assunto = utf8_encode($Contato['Assunto']);
    $mensagem = utf8_encode($contato['Mensagem']);
		break;
	}
  }
  //---------------------------------------------------
?>

<p>* Campos obrigatórios.</p>

<form action="ConsultarAtualizarContatoNegocio2.php">
  <input type="hidden" name="Id" value="<?php echo $Id;?>">
  Nome *:<br>
  <input type="text" name="nome" size="70" value="<?php echo $Nome;?>">
  <br>
  Email *:<br>
  <input type="text" name="Email" size="70" value="<?php echo $Email;?>">
  <br>
  Assunto *:<br>
  <input type="text" name="Assunto" size="70" value="<?php echo $Assunto;?>">
  <br>
  Mensagem *:<br>
  <input type="text" name="Mensagem" size="70" value="<?php echo $Mensagem;?>">
  <br>
  <br>
  <input type="submit" value="Enviar">
  <input type="submit" value="Limpar formulário">
</form>


</body>
</html>
