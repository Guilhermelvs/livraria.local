<!DOCTYPE html>
<html>
<body>

<p>* Campos obrigatórios.</p>

<?php 
	//-----isset verifica se a variável já foi criada
	if (isset($_POST["msg"])) {
		$msg = $_POST['msg'];
		//---Caso a msg contiver a trecho "cancelado", ele será impressa em vermelho
		//---Caso o cadastro tiver sido feito com sucesso, a msg aparecerá em preto
		if(strchr($msg,"cancelado")){
			$color = "red";
		}
		else{
			$color = "black";
		}
	}	
	else{
		$msg = ""; 
	}		
	
?>

<form action="AdicionarContatoNegocio.php">
   Nome *:<br>
  <input type="text" name="nome" size="30">
  <br>
   Email *:<br>
  <input type="text" name="Email" size="30">
  <br>
   Assunto *:<br>
  <input type="text" name="Assunto" size="30">
  <br>
   Mensagem *:<br>
  <input type="text" name="Mensagem" size="30">
  <br>
  <br>
  <input type="submit" value="Cadastrar">
<p style="color:<?php echo $color;?>"><?php echo $msg;?></p>
</body>
</html>