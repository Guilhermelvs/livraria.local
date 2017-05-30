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

<form action="AdicionarLivrosNegocio.php">
  Nome *:<br>
  <input type="text" name="nome" size="60">
  <br>
  Código do livro *:<br>
  <input type="number" min="1" max="50000" name="numero">
  <br>
  Genero *:<br>
  <select name= "cascata">
  <option value="Romance">Romance</option>
  <option value="Comedia">Comédia</option>
  <option value="Drama">Drama</option>
  <option value="Ficcao">Ficção</option>
  <option value="Terror">Terror</option>
  <option value="Docuumentarios">Documentários</option>
 </select>
 <br>
  Editora *:<br>
   <input type="number" min="1" max="50000" name="numero">
  <br>
  Preço *:<br>
  <input type="number" min="1" max="50000" name="numero">
  <br>
  <br>
  <input type="submit" value="Cadastrar">
</form> 
<p style="color:<?php echo $color;?>"><?php echo $msg;?></p>
</body>
</html>