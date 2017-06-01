<!DOCTYPE html>
<html>
<body>

   <p>* Campos obrigat&oacute;rios.</p>

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

<form action="AdicionarCadastroNegocio.php">
  Nome *:<br>
  <input type="text" name="nome" size="30">
  <br>
  Email *:<br>
  <input type="text" name="nome" size="30">
  <br>
  CPF do Cliente *:<br>
  <input type="text" name="Cliente" size="30">
  <br>
   País*:<br>
   <select name="cascata">
 <option>Selecione...</option>
 <option value="AL">AL</option>
 <option value="BO">BO</option>
 <option value="BR">BR</option>
 <option value="IT">IT</option>
 <option value="LR">LR</option>
 <option value="LU">LU</option>
 <option value="NI">NI</option>
 <option value="PR">PR</option>
 <option value="RU">RU</option>
 <option value="SG">SG</option>
 <option value="SY">SY</option>
 <option value="TH">TH</option>
 <option value="VE">VE</option>
 <option value="ZM">ZM</option>
 </select>
  <br>
  Estado*:<br>
 <select name="cascata">
 <option>Selecione...</option>
 <option value="AC">AC</option>
 <option value="AL">AL</option>
 <option value="AP">AP</option>
 <option value="AM">AM</option>
 <option value="BA">BA</option>
 <option value="CE">CE</option>
 <option value="ES">ES</option>
 <option value="DF">DF</option>
 <option value="MA">MA</option>
 <option value="MT">MT</option>
 <option value="MS">MS</option>
 <option value="MG">MG</option>
 <option value="PA">PA</option>
 <option value="PB">PB</option>
 <option value="PR">PR</option>
 <option value="PE">PE</option>
 <option value="PI">PI</option>
 <option value="RJ">RJ</option>
 <option value="RN">RN</option>
 <option value="RS">RS</option>
 <option value="RO">RO</option>
 <option value="RR">RR</option>
 <option value="SC">SC</option>
 <option value="SP">SP</option>
 <option value="SE">SE</option>
 <option value="TO">TO</option>
 </select>
 <br>
  Cidade*:<br>
  <input type="text" name="nome" size="30" name= "End_cliente">
  <br>
  CEP*:<br>
  <input type="text" name="nome" size="30" name= "End_cliente">
  <br>
    Rua*:<br>
  <input type="text" name="nome" size="30" name= "End_cliente">
  <br>
  Numero*:<br>
  <input type="text" name="nome" size="12" name= "End_cliente">
  <br>
  Telefone*:<br>
  <input type="text" size="12" name="tel_cliente">
  <br>
  <br>
    <input type="submit" value="Cadastrar">
</form>
<p style="color:<?php echo $color;?>"><?php echo $msg;?></p>
</body>
</html>
