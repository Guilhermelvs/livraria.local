<!DOCTYPE html>
<html>
<body>

<?php
  require_once("../Conexao/Conexao.php");
  require_once("RepositorioCadastro.php");

  $Id = $_POST[ 'cascata' ];  
  //---------------------------------------------------
  $conexao = new MySQL();
  $repositorio = new RepositorioCadastro($conexao);
	
  $Clientes = $repositorio->getIterator();
  
  foreach($Clientes as $Cliente){
	if ($Cliente['CPF']==$CPF){
		$Nome = utf8_encode($Cliente['Nome']);
		$Email = utf8_encode($Cliente['Email']);
		$CPF_Cliente = $Cliente['CPF_Cliente'];
		$End_cliente = $Cliente['End_cliente'];
		$Tel_cliente = $Cliente['Tel_cliente'];
		break;
	}
  }
  //---------------------------------------------------	
?>
	
<p>* Campos obrigatórios.</p>

<form action="ConsultarAtualizarCadastroNegocio2.php">
  <input type="hidden" name="CPF_Cliente" value="<?php echo $CPF_Cliente;?>">
  Nome *:<br>
  <input type="text" name="nome" size="30" value="<?php echo $Nome;?>">
  <br>
  Email *:<br>
  <input type="text" name="nome" size="30" value="<?php echo $Email;?>">
  <br>
  CPF do Cliente *:<br>
  <input type="text" name="Cliente"size="30" value="<?php echo $CPF_Cliente;?>">
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
  <input type="text" name="nome" size="30" name= "End_cliente" value="<?php echo $End_cliente;?>">
  <br>
  CEP*:<br>
  <input type="text" name="nome" size="30" name= "End_cliente" value="<?php echo $End_cliente;?>">
  <br>
    Rua*:<br>
  <input type="text" name="nome" size="30" name= "End_cliente" value="<?php echo $End_cliente;?>">
  <br>
  Numero*:<br>
  <input type="text" name="nome" size="12" name= "End_cliente" value="<?php echo $End_cliente;?>">
  <br>
  Telefone*:<br>
  <input type="text" size="12" name="tel_cliente" value="<?php echo $Tel_cliente;?>">
  <br>
  <br>  
  <input type="submit" value="Atualizar">
</form> 


</body>
</html>